@extends('layouts.master')

@section('content')
    <div class='container'>
        <ul>
            @foreach($victims as $index => $victim)
                <li class='case-list'>
                    <a href='{{'/profile/' . $victim['last_name'] }}'>
                        {{$victim['first_name']}} {{ $victim['last_name'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
