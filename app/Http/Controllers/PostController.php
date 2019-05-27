<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpOption\Tests\PhpOptionRepo;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::latest()->get();


        $categories = Category::latest()->get();


        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            'title' => 'required|min:5',
            'category_id' => 'required',
            'content' => 'required']);


        $slug = Str::slug($request->title);
        $slug_next = 2;

        while (Category::whereSlug($slug)->first()) {

            $slug = Str::slug($request->title) . '-' . $slug_next;
            $slug_next++;
        }


        $post = new Post();
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->input('content');
        $post->save();


        return redirect()->route('post.index')->with('success', 'Successfully Post created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::latest()->get();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $validation = $request->validate(['title' => 'required|min:5',
            'category_id' => 'required',
            'content' => 'required']);


        $slug = Str::slug($request->title);
        $slug_next = 2;

        while (Category::whereSlug($slug)->first()) {

            $slug = Str::slug($request->title) . '-' . $slug_next;
            $slug_next++;
        }

        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->input('content');
        $post->save();


        return redirect()->route('post.index')->with('success', 'Successfully Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->forceDelete();
        return redirect()->route('post.index')->with('danger', 'Post Deleted successfully');
    }
}
