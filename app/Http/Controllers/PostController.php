<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function show(string $id) {
        $post = Post::findOrFail($id);
        return view('post.post', compact('post'));
    }

    public function create() {
        // if user is logged in
        // allow continuation to create page
    }

    public function store(Request $request) {
        // validate data coming from request
        // store the entire record
        // save and make sure it saves correct
    }

    public function edit(string $id) {
        // make sure user is logged in && correct user of post
        // allow continuation to edit page
    }

    public function update(string $id, Request $request) {
        // validate data coming from request
        // store the entire record
        // save and make sure it saves correct
    }

    public function likePost(string $id) {
        // check post
        // add like
    }
}
