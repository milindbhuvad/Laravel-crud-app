<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel as Post;

class AjaxController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts-ajax.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts-ajax.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::create($request->all());

        return response()->json(['success' => 'Post created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $posts_ajax)
    {
        return view('posts-ajax.edit', compact('posts_ajax'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $post->update($request->all());
        return response()->json(['success' => 'Post updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            // return response()->json(['success' => 'Post deleted successfully.']);
            return redirect()->route('posts-ajax.index')->with('success', 'Post deleted successfully.');
        } else {
            return redirect()->route('posts-ajax.index')->with('error', 'Post not found.');
        }
    }
}
