<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Persist a new reply
     * 
     * @param Tread $thread
     * @param integer $channelId
     * @return \Illuminate\Http\Redirect
     */
    public function store($channelId, Thread $thread)
    {
        $this->validate(request(), [
            'body' => 'required'
        ]);
        
        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
