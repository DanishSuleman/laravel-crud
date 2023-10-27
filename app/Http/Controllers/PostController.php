<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function updatePost(Post $post, Request $request){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        $postFields = $request->validate([
            'post-title' => 'required',
            'post-content' => 'required'
        ]);
        $postFields['post-title'] = strip_tags($postFields['post-title']);
        $postFields['post-content'] = strip_tags($postFields['post-content']);

        $post->update($postFields);
        return redirect('/');
    }
    public function editPost(Post $post) {
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function createPost(Request $request) {
        $postFields = $request->validate([
            'post-title' => [
                'required',
                'min:3',
                'max:255'
            ],
            'post-content' => [
                'required',
                'min:3',
            ]
            ]);
        $postFields['post-title'] = strip_tags($postFields['post-title']);
        $postFields['post-content'] = strip_tags($postFields['post-content']);
        $postFields['user_id'] = auth()->id();
        Post::create($postFields);
        return redirect('/');
    }
};
