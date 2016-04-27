<?php

namespace App\Http\Controllers\Backend;

use App\Products\Product;
use Illuminate\Http\Request;
use App\Utilities\S3FileUpload;
use App\Http\Controllers\Controller;
use App\DataTables\ProductsDataTable;
use App\Http\Requests\Backend\ProductRequest;
use App\Http\Requests\Backend\AttachmentRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ProductsDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDataTable $dataTable)
    {
        //$products = Product::withTrashed()->with(['categories', 'provider'])->orderBy('id', 'DESC')->paginate(50);

        //return view('backend.products.index', compact('products'));

        return $dataTable->render('backend.products.index');
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
        $uploader = app(S3FileUpload::class)->file($request->file('file'))->upload();

        $product = Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'video_url'   => $request->video_url,
            'image_path'  => $uploader->getPath(),
        ]);

        if ($request->get('featured')) {
            $product->feature();
        }

        $product->categorizeMany($request->categories);

        alert()->success('The product has been created successfully.', 'Awww yeah!');

        return redirect(route('admin.products.edit', [$product->id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->findProduct($id);

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
        $product = $this->findProduct($id);

        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'featured'    => $request->featured,
            'published'   => $request->published,
            'video_url'   => $request->video_url,
        ]);

        if ($request->hasFile('file')) {
            $uploader = app(S3FileUpload::class)->file($request->file('file'))->upload();
            $product->setImagePath($uploader->getPath());
        }

        $product->recategorize($request->categories);

        alert()->success('The product has been updated successfully.', 'Oh yesh!');

        return redirect(route('admin.products.edit', [$product->id]));
    }

    public function setProvider($product, Request $request)
    {
        $product = $this->findProduct($product);

        $product->addProviderFromForm($request->all());

        alert()->success('The provider has been updated successfully.', 'Oh yesh!');

        return redirect(route('admin.products.edit', [$product->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->findProduct($id)->forceDelete();

        alert()->success('The product has been deleted successfully.', 'It ain\'t gonna be missed');

        return redirect()->back();
    }

    public function publish($id)
    {
        $this->findProduct($id)->restore();

        alert()->success('The product has been published successfully.', 'Cool');

        return redirect()->back();
    }

    public function unpublish($id)
    {
        $this->findProduct($id)->delete();

        alert()->success('The product has been unpublished successfully.', 'I\'ll be back');

        return redirect()->back();
    }

    public function addAttachment($id, AttachmentRequest $request)
    {
        $product = $this->findProduct($id);

        if ($request->hasFile('file')) {
            $uploader = app(S3FileUpload::class)->file($request->file('file'))->upload();
            $attachment = $product->addAttachment($uploader->getPath());

            return response([
                'path'  => cdn_file($uploader->getPath()),
                'order' => $attachment->order,
            ], 200);
        }
    }

    public function moveAttachment($id, $attachment_id, Request $request)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->moveAttachment($attachment_id, $request->action);

        return redirect(route('admin.products.edit', [$product->id]));
    }

    public function removeAttachment($id, $attachment_id)
    {
        $product = $this->findProduct($id);
        $product->removeAttachment($attachment_id);

        return redirect(route('admin.products.edit', [$product->id]));
    }

    private function findProduct($id)
    {
        return Product::withTrashed()->findOrFail($id);
    }
}
