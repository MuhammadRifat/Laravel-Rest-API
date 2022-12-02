<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return response()->json([
            'status' => true,
            'data' => $posts,
            'message' => 'Successfully loaded'
        ]);
    }

    public function show(Post $post)
    {
        if ($post) {
            return response()->json([
                'status' => true,
                'data' => $post,
                'message' => 'Successfully Loaded'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Not found'
        ]);
    }

    // create a post
    public function store(PostsRequest $request)
    {
        $post = Post::create($request->all());

        return response()->json([
            'status' => true,
            'data' => $post,
            'message' => 'Successfully created'
        ]);
    }

    // update a post
    public function update(PostsRequest $request, Post $post)
    {
        $post->update($request->all());

        return response()->json([
            'status' => true,
            'data' => $post,
            'message' => 'Successfully Updated'
        ]);
    }

    // delete a post
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'status' => true,
            'data' => $post,
            'message' => 'Successfully Deleted'
        ]);
    }
}
