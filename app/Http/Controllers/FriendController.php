<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class FriendController extends Controller
{
    public function store(User $user)
    {
        $user->deleteRequest(auth()->user());
        auth()->user()->addFriend($user);

        return back();
    }

    public function destroy(User $user)
    {
        auth()->user()->removeFriend($user);
        return back();
    }
}
