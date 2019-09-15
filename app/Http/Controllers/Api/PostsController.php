<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function show($id, Request $request)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->fill($request->all());
        $post->save();
        return response()->json($post);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->fill($request->all());
        $post->save();
        return response()->json($post);
    }

}