@extends('layouts.master')

@section('content')
    <div class='row'>
        <h1>Confirmation</h1>
        <h2>Welcome</h2>
    </div>
    <div class='row'>
        <div class='col-1-2'>
            <ul>
                <li>
                    <a href='{{ '/add-source/' . $perpetrator->id }}'>Add Sources</a>
                </li>
                <li>
                    <a href='{{ '/add-images/' . $perpetrator->id }}'>Add Images</a>
                </li>
            </ul>
            @foreach($perpetrator->victims as $victim)
                <a href='{{ '/update-victim/' . $victim->id }}'>{{ $victim->first_name }} {{ $victim->last_name }}</a>
            @endforeach
        </div>
        <div class='col-1-2'>
            <a href='{{ '/add-victim/' . $perpetrator->id }}'>Add Victim</a>
        </div>

    </div>
@endsection
