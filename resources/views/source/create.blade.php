@extends('layouts.master')

@section('content')
    <h1>Add Source</h1>
    <form class='add-input' method='POST' action='{{ '/source/' . $perpetrator->id }}'>
        {{ csrf_field() }}
        <label for='source'>Source URL:</label>
        <input type='text' autocomplete='off' name='source' id='source'>
        <button type='submit' class='btn btn-primary'>Save</button>
    </form>
@endsection
