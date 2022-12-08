<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\PostsRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return Helper::response_success(true, $posts, 'Successfully Loaded');
    }

    // get individual posts by id
    public function show(Post $post)
    {
        if ($post) {
            return Helper::response_success(true, $post, 'Successfully Loaded');
        }
        return Helper::response_error('Not found', 404);
    }

    // create a post
    public function store(PostsRequest $request)
    {
        $post = Post::create($request->all());

        return Helper::response_success(true, $post, 'Successfully created');
    }

    // update a post
    public function update(PostsRequest $request, Post $post)
    {
        $post->update($request->all());

        return Helper::response_success(true, $post, 'Successfully Updated');
    }

    // delete a post
    public function destroy(Post $post)
    {
        $post->delete();

        return Helper::response_success(true, $post, 'Successfully Deleted');
    }
}
