<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class ComentController extends Controller
{
    public function store(Comment $comment, Request $request, Post $post)
    {
        $input['comment'] = $request['comment'];
        $input['user_id'] = Auth::id();
        $input['post_id'] = $post->id;
        $comment->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
