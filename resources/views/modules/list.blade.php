@extends('layouts.master')

@section('content')
    <div class='container'>
        <ul>
            @foreach($victims as $victim)
                <li id='case-list'>
                    <a href='{{'/profile/' . $victim->last_name }}'>
                        {{$victim->first_name}} {{ $victim->last_name }}</a>
                </li>
            @endforeach
        </ul>
        {{ $victims->links() }}
    </div>
@endsection
