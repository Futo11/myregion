<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Post;

class EventController extends Controller
{
    public function create(Post $post)
    {
        return view('events.create')->with(['post' => $post]);
    }
    
    public function store(Post $post,Request $request,Event $event)
    
    {
        $input=$request['event'];
        $event->post_id=$post->id;
        $event->fill($input)->save();
        return redirect('/');
    }
}
