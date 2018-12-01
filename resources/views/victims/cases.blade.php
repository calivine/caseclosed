@extends('layouts.master')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-1-3'>
                <ul>
                    @foreach($victims as $index => $victim)
                        <li>
                            <a href='{{'/profile/' . $victim['last_name'] }}'>
                                {{$victim['first_name']}} {{ $victim['last_name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
