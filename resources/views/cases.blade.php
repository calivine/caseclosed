@extends('layouts.master')

@section('content')
    <h1>{{ config('app.name') }}</h1>
    <ul>
        @foreach($victims as $index => $victim)
            <li>
                <a href='{{'/profile/' . $victim['last_name'] }}'>
                    {{$victim['first_name']}} {{ $victim['last_name'] }}</a>
            </li>
        @endforeach
    </ul>
@endsection
