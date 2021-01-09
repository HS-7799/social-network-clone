<aside class="text-lg-center text-xs-left bg-white p-1 pl-0 aside-links">

        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link" href="{{ auth()->user()->path() }}">
                 Profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('explore.index') }}">Explore</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('conversations.index') }}">Messages</a>
            </li>

          </ul>


</aside>
