<x-app>

    @include('inc._add-post',[
        "user" => auth()->user(),
        "placeholder" => "What's on your mind, ".auth()->user()->name."?"
    ])

    @include('inc.posts')

</x-app>
