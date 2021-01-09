<aside class=" p-1 aside-friends">
    <h3 class="text-center">Friends</h3>
        <div class="container">
            @forelse ($friends as $friend)
            <div class="row bg-white p-2 mb-1">
                <div class="col-9">
                    <a  href="{{ $friend->path() }}" style="display: block">
                        <img src="{{ $friend->avatar }}" class="rounded-circle" alt="" width="25px"/>
                        {{ $friend->name }}

                    </a>
                </div>
                <div class="col-2">
                    <a class="col nav-link " href="{{ route('conversations.show',['user'=>$friend->username]) }}" title="Messages">
                        <i class="fab fa-facebook-messenger"  style="font-size:15px"></i>
                    </a>
                </div>
            </div>
        @empty
        you don't have any friend yet
        @endforelse
        </div>

</aside>
