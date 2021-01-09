<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profiles.show',[
            "user" => $user,
            "posts" => $user->journal->posts()->latest()->get()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        return view('profiles.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update',$user);

        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:5', 'max:255','alpha_dash',Rule::unique('users')->ignore($user)],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['image','sometimes'],
            'banner' => ['image','sometimes'],
        ]);

        $user->update($attributes);

        if(request('avatar'))
        {
            $this->storeAvatar($user);
        }
        if(request('banner'))
        {
            $this->storebanner($user);
        }


        return redirect()->route('profiles.edit',$user->username)->with('success','Your profile is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function storeAvatar($user){
        if(request('avatar'))
        {
            $user->update([
                'avatar' => request('avatar')->store('avatars')
            ]);

            $image = Image::make(public_path($user->avatar))->fit(300,300)->save();
            $image->save();
        }
    }

    public function storebanner($user){
        if(request('banner'))
        {
            $user->update([
                'banner' => request('banner')->store('banners')
            ]);

            $image = Image::make(public_path($user->banner))->crop(570,250)->save();
            $image->save();
        }
    }
}
