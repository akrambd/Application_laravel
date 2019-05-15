<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $categories= Category::all();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {


        $category= new Category();

        $category->name= $request->name;
        $category->slug= $request->slug;

        $category->save();


        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view('category.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //

        $category->name=$request->name;
        $category->save();

        return view('category.show', compact('category'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //

        $category->forceDelete();

        return redirect()->route('category.index');

    }



//    public function postone(Category $category)
//    {
//        //
//
////        $category= Category::findOrFail($category);
//
//        return $category->name;
//
////      $category= Category::findOrFail($category);
//////
//////      echo $category->post()->name;
//
////        return view('category.postview', compact('category'));
//
//
//
//
////        $category = Category::where('category_id', $category)->firstOrFail();
////        return view('category.postview', compact('$category'));
//
//    }

    public function postone(Category $category)
    {
        //

        return view('category.postview', compact('category'));

    }


}
