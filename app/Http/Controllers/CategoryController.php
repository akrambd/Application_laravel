<?php

namespace App\Http\Controllers;


use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Psy\Output\ProcOutputPager;

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
        //validation

        $validate=$request->validate(['name'=>'required|min:3']);

        $slug= Str::slug($request->name);
        $slug_next=1;
        while (Category::whereSlug($slug)->first()){

            $slug= Str::slug($request->name).'-'.$slug_next;
            $slug_next++;
        }


        $category= new Category();
        $category->name= $request->name;
        $category->slug= $slug;
        $category->save();


        return redirect()->route('category.index')->with('success', 'Category created successfully');
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

        $posts= Post::whereCategory_id($category->id)->get();

        return view('category.show', compact('category','posts'));

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
        $validate=$request->validate(['name'=>'required|min:3']);



        $slug=Str::slug($request->name);
        $slug_next=1;
        while (Category::whereSlug($slug)->first()){
            $slug=Str::slug($request->name).'-'.$slug_next;
            $slug_next++;

        }


        $category->name=$request->name;
        $category->slug=$slug;
        $category->save();

//        return view('category.show', compact('category'));
        return redirect()->route('category.index')->with('success', 'Category created successfully');


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

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');

    }




    public function postview(Category $category)
    {
        $post= Post::whereCategory_id($category->id)->get();
        $i=1;

        return view('category.postview', compact('category','post','i'));

    }


    public function postadd(Request $request)
    {
        $validation= $request->validate(['title'=>'required|min:5',
            'content'=> 'required']);


        $slug=Str::slug($request->title);
        $slug_next=2;

        while (Category::whereSlug($slug)->first()){

            $slug=Str::slug($request->title).'-'.$slug_next;
            $slug_next++;
        }




        $post= new Post();
        $post->category_id=$request->category_id;
        $post->title=$request->title;
        $post->slug=$slug;
        $post->content=$request->input('content');
        $post->save();


        return redirect()->route('postview', array('category_id' =>$request->category_id))->with('success','Successfully Post created');

    }


    public function postedit(Post $post)
    {

        return view('category.postviewedit', compact('post'));

    }

    public function postupdate(Request $request,Post $post, Category $category)
    {
        $validation= $request->validate(['title'=>'required|min:5',
            'content'=> 'required']);


        $slug=Str::slug($request->title);
        $slug_next=2;

        while (Category::whereSlug($slug)->first()){

            $slug=Str::slug($request->title).'-'.$slug_next;
            $slug_next++;
        }


//        $post->category_id=$request->category_id;
        $post->title=$request->title;
        $post->slug=$slug;
        $post->content=$request->input('content');
        $post->save();



        return redirect(route('postview', array('category_id' =>$request->category_id)));

    }

    public function postdelete(Request $request, Post $post)
    {
        //

        $post->forceDelete();

//        dd($post->category_id);

        return redirect(route('postview', array('category_id' =>$post->category_id)))->with('success','Successfully Post Deleted');

    }



}
