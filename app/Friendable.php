<?php

namespace App;

trait Friendable
{
    // friendship that i started

    public function friendsOfThisUser()
    {
        return $this->belongsToMany(User::class,'friends','user_id','friend_id');
    }

    public function thisUserFriendOf()
    {
        return $this->belongsToMany(User::class,'friends','friend_id','user_id');
    }

    public function addFriend(User $user)
    {
        return $this->thisUserFriendOf()->save($user);
    }

    public function removeFriend(User $user)
    {
        // return $this->follows()->where('following_user_id',$user->id)->exists();
        return  $this->thisUserFriendOf->contains($user) ? $this->thisUserFriendOf()->detach($user) :  $this->friendsOfThisUser()->detach($user);;
    }

    public function friends()
    {
        $allFriends =  $this::with('friendsOfThisUser','thisUserFriendOf')->get()
        ->where('id',$this->id);


        $friendsOfThisUserIds = $allFriends->pluck('friendsOfThisUser.*.id')->flatten()->unique();
        $thisUserFriendOfids = $allFriends->pluck('thisUserFriendOf.*.id')->flatten()->unique();
        $ids = $friendsOfThisUserIds->push($thisUserFriendOfids)->flatten();
        return User::whereIn('id',$ids)->latest()->get();

    }

    public function isFriend(User $user)
    {
        return $this->friends()->contains($user);
    }


}

?>
