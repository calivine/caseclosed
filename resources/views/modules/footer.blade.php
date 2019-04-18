<div class='footerBody'>
    <ul>
        <li>
            <a href='{{ url('https://www.pitchforked.net') }}'>Pitchforked</a></li>
        <li>
            A Beyond The Looking Glass Project &copy; {{ date('Y') }}
        </li>
        <li>
            @if(Auth::guest())
                <a href='{{ '/login' }}'>Login</a>
            @endif
        </li>
        <li>
            <a href='{{ url('https://github.com/calivine/caseclosed/blob/master/api.md') }}'>API</a>
        </li>
    </ul>

</div>
