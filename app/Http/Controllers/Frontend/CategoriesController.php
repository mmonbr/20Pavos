<?php

namespace App\Http\Controllers\Frontend;

use App\Products\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $category = Category::findBySlugOrIdOrFail($id);
        $categories = Category::defaultOrder()->get()->toTree();
        $products = $category->products()->with('provider')->filter($request->all())->paginate(21);

        return view('frontend.categories.show', compact('products', 'category', 'categories'));
    }
}
