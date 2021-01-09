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
        <div class="col-9 bg-dark p-2" style="position: fixed;right:0;bottom:0px;top:60px;" >
            <div class="card">
                <div class="card-header">
                    jhh
                </div>
                <div class="card-body" style="overflow:auto;">

                    <p class="card-text">Content</p>
                    <p class="card-text">Content</p>
                    <p class="card-text">Content</p>
                    <p class="card-text">Content</p>
                    <p class="card-text">Content</p>
                </div>
            </div>
        </div>

    </div>
</x-master>
