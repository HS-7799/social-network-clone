@foreach ($posts as $post)

    <article>
        <div class="card">
            <div class="card-body">
                <div class="mb-2 post-header">
                    <a href="{{ $post->user->path() }}">
                        <img src="{{ $post->user->avatar }}" width="45px" class="rounded-circle mr-2" alt="{{ $post->user->name }} 's avatar">
                        <strong class='text-dark'>
                            {{ $post->user->name }}
                        </strong>

                    </a>

                    @if ($post->user->isNot($post->journal->user))
                    <i class="fas fa-caret-right text-primary"></i>

                    <a href="{{ $post->journal->user->path() }}">
                        <strong class='text-dark'>{{ $post->journal->user->name }}</strong>
                    </a>
                    @endif
                    <small class="text-secondary post-created-at disabled">
                        {{ $post->created_at->diffForHumans() }}
                    </small>
                </div>

                <p>{{ $post->body }}</p>
            </div>

        </div>
    </article>

@endforeach
