@extends('layouts.master')

@section('content')
    <div class='row'>
        <h1>Admin Portal</h1>
        <h2>Welcome</h2>
    </div>
    <div class='row'>
        <a href='/new'>Create New Case</a>
    </div>
    <div class='row'>
        <ul>
            @foreach($perpetrators as $perpetrator)
                <li>
                    <a href='{{ '/case-dashboard/' . $perpetrator->id }}'>{{ $perpetrator->first_name }}</a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
