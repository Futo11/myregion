<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use App\Models\Region;
use App\Models\Event;
use Cloudinary;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post, Comment $comment, Event $event)
    {
        $comments=$comment->where('post_id',$post->id)->get();
        $event=$post->events;
        return view('posts.show')->with(['post' => $post,'comments' => $comments, 'events' => $event]);
        
    }

    public function create(Region $region, Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get(),'regions' => $region->get()]);
    }

   public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        if($request->file('image')){ 
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        $post->user_id=\Auth::id();
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
}