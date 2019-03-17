<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    {{-- CSS global to every page can be loaded here --}}
    <link href='/css/app.css' rel='stylesheet'>

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

<h1>
    {{ config('app.name') }}
</h1>

<h2>
    Solved Murder and Missing Persons Archive
</h2>

<main>
    <div class='container'>
        @yield('content')
    </div>
</main>

<footer>
    &copy; {{ date('Y') }}
    <a href='/login'>Login</a>
</footer>

{{-- JS global to every page can be loaded here; jQuery included just as an example --}}
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
        integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa'
        crossorigin='anonymous'></script>

{{-- JS specific to a given page/child view can be included via a stack --}}
@stack('body')

</body>
</html>