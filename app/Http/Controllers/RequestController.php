<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RequestController extends Controller
{

    public function index()
    {
        return view('requests.index',[
             "users" => auth()->user()->requestsFrom
        ]);
        // ()->paginate(4)
    }

    public function store(User $user)
    {
        auth()->user()->toggleRequest($user);
        return back();
    }

    public function delete(User $user)
    {
        $user->deleteRequest(auth()->user());

        return back();
    }

}
