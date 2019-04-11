@extends('layouts.master')

@section('content')
    <div class='container'>
        <ul class='case-list'>
            @foreach($victims as $index => $victim)
                <li>
                    <a href='{{'/profile/' . $victim['last_name'] }}'>
                        {{$victim['first_name']}} {{ $victim['last_name'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
