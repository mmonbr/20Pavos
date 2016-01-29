<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Requests\Backend\AttachmentRequest;
use App\Http\Requests\Backend\ProductRequest;
use App\Product;
use App\Utilities\S3FileUpload;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(50);

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $uploader = app('App\Utilities\S3FileUploader')->file($request->file('file'))->upload();

        $product = Product::create([
            'name'              => $request->name,
            'short_description' => $request->short_description,
            'long_description'  => $request->long_description,
            'current_price'     => $request->current_price,
            'is_featured'       => $request->featured,
            'referral_link'     => $request->referral_link,
            'ASIN'              => $request->ASIN,
            'image_url'         => $uploader->getPath(),
        ]);

        $product->categorizeMany($request->categories);

        alert()->success('The product has been created successfully.', 'Awww yeah!');

        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.products.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('backend.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name'              => $request->name,
            'short_description' => $request->short_description,
            'long_description'  => $request->long_description,
            'current_price'     => $request->current_price,
            'is_featured'       => $request->featured,
            'referral_link'     => $request->referral_link,
            'ASIN'              => $request->ASIN
        ]);

        if ($request->hasFile('file')) {
            $uploader = app(S3FileUpload::class)->file($request->file('file'))->upload();
            $product->setImageUrl($uploader->getPath());
        }

        $product->recategorize($request->categories);

        alert()->success('The product has been updated successfully.', 'Oh yesh!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        alert()->success('The product has been deleted successfully.', 'It ain\'t gonna be missed');

        return redirect()->back();
    }

    public function addAttachment($id, AttachmentRequest $request)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('file')) {
            $uploader = app(S3FileUpload::class)->file($request->file('file'))->upload();
            $attachment = $product->addAttachment($uploader->getPath());

            return response([
                'path'  => cdn_file($uploader->getPath()),
                'order' => $attachment->order
            ], 200);
        }
    }

    public function moveAttachment($id, $attachment_id, Request $request)
    {
        $product = Product::findOrFail($id);
        $product->moveAttachment($attachment_id, $request->action);

        return redirect(route('admin.products.edit', [$product->id]));
    }

    public function removeAttachment($id, $attachment_id)
    {
        $product = Product::findOrFail($id);
        $product->removeAttachment($attachment_id);

        return redirect(route('admin.products.edit', [$product->id]));
    }
}
