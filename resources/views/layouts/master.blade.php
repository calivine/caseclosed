<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    {{-- CSS global to every page can be loaded here --}}
    <link href='{{ '/css/app.css' }}' rel='stylesheet'>

    {{-- CSS specific to a given page/child view can be included via a stack --}}
    @stack('head')
</head>
<body>

<header>
    @include('modules.title')
    @include('modules.nav')
</header>

@if ($errors->any())
    <div class='error'>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif

@if(session('alert'))
    <div class='success'>
        {{ session('alert') }}
    </div>
@endif

<main>
    @yield('content')
</main>

<footer>
    @include('modules.footer')
</footer>

{{-- JS specific to a given page/child view can be included via a stack --}}
@stack('body')

</body>
</html>