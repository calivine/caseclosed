<nav>
    <ul>
        @foreach(config('app.nav') as $link => $label)
            <li>
                @if(Request::is(substr($link, 1)))
                    {{ $label }}
                @else
                    <a href='{{ $link }}'>{{ $label }}</a>
                @endif
            </li>
        @endforeach
        @if(Auth::check())
            <li>
                <a href='/admin'>Admin Portal</a>
            </li>
            <li>
                <form method='POST' id='logout' action='/logout'>
                    {{ csrf_field() }}
                    <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
                </form>
            </li>
        @endif
    </ul>
</nav>