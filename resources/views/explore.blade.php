<x-app>
    @foreach ($users as $user)

    <article>
        <div class="card">
            <div class="card-body">
                <div class="mb-2 post-header">
                    <a href="{{ $user->path() }}">
                        <img src="{{ $user->avatar }}" width="45px" class="rounded-circle mr-2" alt="{{ $user->name }} 's avatar">
                        <strong class='text-dark'>
                            {{ $user->name }}
                        </strong>

                    </a>
                </div>
                <div class="float-right">
                    @if(auth()->user()->isNot($user))
                        @include('inc._confirm-cancel')
                    @endif
                </div>
            </div>

        </div>
    </article>



    @endforeach
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-5">
            {{ $users->links() }}
        </div>
    </div>
</x-app>
