@extends('layouts.master')

@section('content')

    <h1>{{ config('app.name') }}</h1>
    <p>Name: {{$name['first_name'] }} {{ $name['middle_name'] }}  {{ $name['last_name'] }}<br>
        Gender: {{ $name['gender'] }}<br>
        Age at time of disappearance: {{ $name['age'] }}
    </p>
    <p>
        Perpetrator: {{ $name['perp_first_name'] }} {{ $name['perp_last_name'] }}
    </p>
    <p>
        Arrested On: {{ $name['arrest_date'] }}
    </p>
    <p>
        {{ $name['detail'] }}
    </p>
    <a href='{{ $name['url'] }}'>Source</a>
    <a href='/cases'>Return</a>



@endsection
