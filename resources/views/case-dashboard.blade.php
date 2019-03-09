@extends('layouts.master')

@section('content')
    <div class='row'>
        <h1>Confirmation</h1>
        <h2>Welcome</h2>
    </div>
    <div class='row'>
        <a href='{{ '/add-source/' . $perpetrator->id }}'>Add Sources</a>
        <a href='{{ '/add-victim/' . $perpetrator->id }}'>Add Victim</a>
        <a href='{{ '/add-images/' . $perpetrator->id }}'>Add Images</a>
    </div>
@endsection
