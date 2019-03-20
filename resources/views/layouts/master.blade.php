<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    {{-- CSS global to every page can be loaded here --}}
    <link href='{{ '/css/app.css' }}' rel='stylesheet'>

    <link href='{{ '/css/app-style.css' }}' rel='stylesheet'>

    {{-- CSS specific to a given page/child view can be included via a stack --}}
    @stack('head')
</head>
<body>
@if(session('alert'))
    <div class='alert-success'>
        {{ session('alert') }}
    </div>
@endif

<header class='header-primary'>
    @include('modules.nav')
</header>

@if ($errors->any())
    <div class='alert-error'>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif

<main class='container'>
    <h1>
        {{ config('app.name') }}
    </h1>
    <div class='inner-container'>
        @yield('content')
    </div>
</main>

<footer>
    <a href='#'>Contact</a>
    <a href='{{ '/login' }}'>Login</a>
    &copy; {{ date('Y') }}
    A Beyond The Looking Glass Project
</footer>

{{-- JS global to every page can be loaded here; jQuery included just as an example --}}
<script src='{{ 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' }}'
        integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa'
        crossorigin='anonymous'></script>

{{-- JS specific to a given page/child view can be included via a stack --}}
@stack('body')

</body>
</html>