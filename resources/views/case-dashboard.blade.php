@extends('layouts.master')

@section('content')
    <div class='row'>
        <h1>Confirmation</h1>
        <h2>Welcome</h2>
    </div>
    <div class='row'>
        <ul>
            <li>
                <a href='{{ '/add-source/' . $perpetrator->id }}'>Add Sources</a>
            </li>
            <li>
                <a href='{{ '/add-victim/' . $perpetrator->id }}'>Add Victim</a>
            </li>
            <li>
                <a href='{{ '/add-images/' . $perpetrator->id }}'>Add Images</a>
            </li>
        </ul>
    </div>
@endsection
