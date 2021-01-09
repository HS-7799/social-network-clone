<x-master class="container-fluid conteneur-messages ">
    <div class="row">
        <div class="col-3 bg-white" style="position: fixed;left:0;bottom:0;top:60px;overflow:auto" >
            @foreach ($friends as $friend)
            <a href="{{ route('conversations.show',$friend->username) }}">
                <div class="p-3 text-xs-center" >
                    <img src="{{ $friend->avatar }}" width="60px" class="rounded-circle mr-2" alt="{{ $friend->name }} 's avatar">
                    <strong class='text-dark'>
                        {{ $friend->name }}
                    </strong>
            </div>
            </a>
            @endforeach
        </div>
        <div class="col-9 p-2" style="position: fixed;right:0;bottom:0px;top:60px;" >
            <div class="card" style="height:550px" >
                <div class="card-header">
                    <img src="{{ $user->avatar }}" width="60px" class="rounded-circle mr-2" alt="{{ $friend->name }} 's avatar">
                    <strong class='text-dark'>
                        <a href="{{ $user->path() }}">{{ $user->name }}</a>
                    </strong>
                </div>
                <div class="card-body p-0" style="overflow:auto;">
                    @if ($messages->previousPageUrl())
                        <a class="text-center" href="{{ $messages->previousPageUrl() }}">previous</a>
                    @endif
                    @foreach($messages as $message)
                        <div class="{{ auth()->user()->is($message->from) ? 'text-right':''}} p-3" >
                            @if (auth()->user()->isNot($message->from))
                                <img src="{{ $message->from->avatar }}" width="25px" class="rounded-circle mr-2" alt="{{ $friend->name }} 's avatar">

                            @endif
                            <span class="{{ auth()->user()->isNot($message->from) ? 'bg-light rounded p-2' : 'bg-primary rounded text-white p-2' }}">
                                {{-- {!! nl2br(e($message->content)) !!} --}}
                                {{ $message->content }}
                            </span>


                        </div>

                    @endforeach

                    @if ($messages->hasMorePages())
                        <a class="text-center" href="{{ $messages->nextPageUrl() }}">next</a>
                    @endif


                </div>
                <div class="card-footer">
                    <form action="/conversations/{{ $user->username }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <textarea  placeholder="Type a message..." class="form-control  @error('content') is-invalid @enderror  " name="content" autofocus ></textarea>
                        </div>
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn-primary">send</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-master>
