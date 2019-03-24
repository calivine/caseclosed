<nav>
    <ul>
        @if(Auth::check())
            @foreach(config('app.navAdmin') as $link => $label)
                @if(Request::is(substr($link, 1)))
                    <li>{{ $label }}</li>
                @else
                    <li><a href='{{ $link }}'>{{ $label }}</a></li>
                @endif
            @endforeach
        <li>
            <form method='POST' id='logout' action='/logout'>
                {{ csrf_field() }}
                <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
            </form>
        </li>
        @else
            @foreach(config('app.nav') as $link => $label)
                @if(Request::is(substr($link, 1)))
                    <li>{{ $label }}</li>
                @else
                    <li><a href='{{ $link }}'>{{ $label }}</a></li>
                @endif
            @endforeach
        @endif
    </ul>
</nav>