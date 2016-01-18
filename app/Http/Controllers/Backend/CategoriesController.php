<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->with(['children', 'productsCount'])->get();

        $dropdown = Category::all()->toTree();

        return view('backend.categories.index', compact('categories', 'dropdown'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->back();
    }

    public function moveDown($id)
    {
        Category::findOrFail($id)->down();

        return redirect()->back();
    }

    public function moveUp($id)
    {
        Category::findOrFail($id)->up();

        return redirect()->back();
    }

    public function makeChildrenOf(Request $request, $id)
    {
        $children = Category::findOrFail($id);

        if($request->category_id == 'root'){
            $children->makeRoot()->save();;
            return redirect()->back();
        }

        $parent = Category::findOrFail($request->category_id);

        $parent->appendNode($children);

        return redirect()->back();
    }
}
