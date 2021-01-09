<?php

namespace App;
trait Requestable
{
    public function requestsTo()
    {
        return $this->belongsToMany(User::class,'requests','user_id','request_to');
    }

    public function addRequest(User $user)
    {
        return $this->requestsTo()->save($user);
    }

    public function deleteRequest(User $user)
    {
        return $this->requestsTo()->detach($user);
    }

    public function sentRequestTo(User $user)
    {
        return $this->requestsTo->contains($user);
    }
    public function sentRequestFrom(User $user)
    {
        return $this->requestsFrom->contains($user);
    }
    public function toggleRequest(User $user)
    {
        return $this->requestsTo()->toggle($user);
    }

    public function requestsFrom()
    {
        return $this->belongsToMany(User::class,'requests','request_to','user_id');
    }
}


?>
