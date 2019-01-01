<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    {{-- CSS global to every page can be loaded here --}}
    <link href='/css/app.css' rel='stylesheet'>

    {{-- CSS specific to a given page/child view can be included via a stack --}}
    @stack('head')
</head>
<body>
<header class='header-primary'>
    @include('modules.nav')
</header>

<h1>
    {{ config('app.name') }}
</h1>


<main class='container'>
    @yield('content')
</main>

<footer>
    <div class='container'>
        <div class='row'>
            <div class='col-1-2'>
            </div>
            <div class='col-1-6'>
                &copy; {{ date('Y') }}
            </div>
            <div class='col-1-6'>
                @include('modules.return')
            </div>
        </div>
    </div>
</footer>

{{-- JS global to every page can be loaded here; jQuery included just as an example --}}
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
        integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa'
        crossorigin='anonymous'></script>

{{-- JS specific to a given page/child view can be included via a stack --}}
@stack('body')

</body>
</html>