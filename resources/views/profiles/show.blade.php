<x-app>
    <div class="banner">
        <a href="{{  $user->banner }}">
            <img src="{{$user->banner}}" width="100%" class="img-fluid rounded" alt="">
        </a>

        <div class="banner-profile-picture">
            <a href="{{ $user->avatar }}">
                <img src="{{ $user->avatar }}" width="140px" class="img-fluid rounded-circle profile-picture"  alt="">
            </a>
        </div>
        <h2 >{{ $user->name }}</h2>
        @if(auth()->user()->isNot($user))
            <div class="Addrequest">
                @include('inc._confirm-cancel')
                <div>
                <a href="{{ route('conversations.show',$user->username) }}" class="mt-2 btn btn-primary float-right">Message</a>

                </div>
            </div>
        @endif
    </div>

        @if (auth()->user()->isFriend($user) || auth()->user()->is($user))
        @include('inc._add-post',[
            "placeholder" => auth()->user()->is($user) ? "What's on your mind?" : "write something to ".$user->name
        ])
        @endif



    @include('inc.posts')

</x-app>
