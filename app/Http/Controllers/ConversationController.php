<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;

class ConversationController extends Controller
{
    public function index()
    {
        return view('conversations.index',[
            'friends' => auth()->user()->friends()
        ]);
    }

    public function show(User $user)
    {
        $currentUserId = auth()->id();
        $userId = $user->id;
        $messages = Message::where('from_id',$currentUserId)->where('to_id',$userId)
        ->orWhere(function($query) use($currentUserId,$userId){
            $query->where('to_id',$currentUserId)->where('from_id',$userId);
        })->paginate(6);

        return view('conversations.show',[
            'friends' => auth()->user()->friends(),
            'user' => $user,
            'messages' => $messages
        ]);
    }

    public function store(Request $request,User $user)
    {
        request()->validate([
            'content' => ['required']
        ]);

        $message = new Message();

        $message->from_id = auth()->id();
        $message->to_id = $user->id;
        $message->content = request('content');
        $message->save();

        return redirect()->route('conversations.show',[
            'user' => $user->username
        ]);
    }
}
