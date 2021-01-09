<x-master class="d-flex justify-content-between conteneur" >

    {{-- sidebar links --}}
    @include('inc._sidebar-links')

    <section class="posts-section pb-5">
        {{ $slot }}
    </section>


    @include('inc._sidebar-friends',[
        "friends" => auth()->user()->friends()
    ])


</x-master>
