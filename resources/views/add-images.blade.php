@extends('layouts.master')

@section('content')
    <form method='POST' action='{{ '/images/' . $perpetrator->id }}'>
        {{ csrf_field() }}
        <fieldset>
            <label for='victim_image'>Victim Image:</label>
            <input type='text' autofocus autocomplete='off' name='victim' id='victim_image'>
            <label for='perpetrator_image'>Perpetrator Image:</label>
            <input type='text' autocomplete='off' name='perpetrator' id='perpetrator_image'>
            <label for='other'>Additional Image:</label>
            <input type='text' autocomplete='off' name='other' id='other'>
            <button type='submit' class='btn btn-primary'>Save</button>
        </fieldset>
    </form>

@endsection