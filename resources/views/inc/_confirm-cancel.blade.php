@if (auth()->user()->isFriend($user))
    <a class="dropdown-toggle btn btn-outline-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fas fa-check"></i> Friends
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

        <a class="dropdown-item" href="" onclick="event.preventDefault();
        document.getElementById('unfriend-form').submit();">
            Unfriend
        </a>
        <form id="unfriend-form" action="/friends/{{ $user->username }}" method="POST" style="display: none;">
            @csrf
            @method('delete')
        </form>
    </div>
@else

    @if (auth()->user()->sentRequestFrom($user))
        <form action="/requests/{{ $user->username }}" method="post" class="float-right ml-2">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Cancel</button>
        </form>
                        <form action="/friends/{{ $user->username }}" method="post" class="float-right ml-2">
            @csrf
            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
    @else
        <form action="/requests/{{ $user->username }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">
                {{ auth()->user()->sentRequestTo($user) ? "Cancel Request" : 'Add friend'}}
            </button>
        </form>
    @endif

@endif
