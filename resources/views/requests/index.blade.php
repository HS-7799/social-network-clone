<x-app>

    @forelse ($users as $user)

        <div class="card mb-2">
            <div class="card-body">

                    <a href="{{ $user->path() }}">
                        <img src="{{ $user->avatar }}" width="50px" class="rounded-circle mr-2" alt="{{ $user->name }} 's avatar">
                        <strong class='text-dark'>
                            {{ $user->name }}
                        </strong>
                    </a>

                    <div class="pt-2">
                        <form action="/requests/{{ $user->username }}" method="post" class="float-right ml-2">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </form>
                        <form action="/friends/{{ $user->username }}" method="post" class="float-right ml-2">
                            @csrf
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </form>
                    </div>
            </div>
        </div>

    @empty
    <p class="p-3">You don't have any requests</p>

    @endforelse

    {{-- <div class="text-center">
        <p>{{ $users->links() }}</p>
    </div> --}}


</x-app>
