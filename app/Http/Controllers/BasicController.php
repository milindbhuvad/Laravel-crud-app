<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel as Post;

class BasicController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('basic.index', compact('posts'));
    }

    public function create()
    {
        return view('basic.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('basic.index')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('basic.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('basic.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('basic.index')->with('success', 'Post deleted successfully.');
    } 
}
