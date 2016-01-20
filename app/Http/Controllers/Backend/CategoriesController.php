<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\CategoryRequest;

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

        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name
        ]);

        $category->update([
            'parent_id' => $request->parent_id
        ]);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        Category::findOrFail($id)->update([
            'name'      => $request->name,
            'slug'      => $request->slug,
            'parent_id' => $request->parent_id
        ]);

        alert()->success('The category has been created successfully.', '#feelsgood');

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
        Category::findOrFail($id)->delete();

        alert()->success('The category has been successfully deleted.', 'Bye bye beautiful');

        return redirect()->back();
    }

    public function moveDown($id)
    {
        Category::findOrFail($id)->down();

        alert()->success('The category has been successfully moved down.', 'The last will be first');

        return redirect()->back();
    }

    public function moveUp($id)
    {
        Category::findOrFail($id)->up();

        alert()->success('The category has been successfully moved up.', 'Step aside bitches');

        return redirect()->back();
    }

    public function makeChildrenOf(Request $request, $id)
    {
        Category::findOrFail($id)->update([
            'parent_id' => $request->parent_id
        ]);

        alert()->success('The category has been successfully moved.', 'Luke, I am your father');

        return redirect()->back();
    }
}
