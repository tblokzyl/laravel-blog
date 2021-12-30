<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {

        request()->validate([
            'body' => 'required'
        ]);

        // add a comment to the given post
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
