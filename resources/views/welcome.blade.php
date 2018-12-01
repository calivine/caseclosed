@extends('layouts.master')

@section('content')

    <h1>{{ config('app.name') }}</h1>
    <p>Under Construction</p>
    <div class='container'>
        <div class='row'>
            <div class='col-1-3'>
                @foreach($victims as $victim)
                    <p>{{ $victim->first_name }} {{ $victim->last_name }}</p>
                    <p>Age: {{ $victim->age }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
