@extends('layouts.master')

@section('content')
    <form class='add-input' method='POST' action='{{ '/image/' . $perpetrator->id }}'>
        {{ csrf_field() }}
        <fieldset>
            <label for='url'>Image URL:</label>
            <input type='text' autofocus autocomplete='off' name='url' id='url'>
            <label for='type'>Type:</label>
            <select name='type'>
                <option value='victim'>Victim</option>
                <option value='perpetrator'>Perpetrator</option>
                <option value='other'>Other</option>
            </select>
            <label for='caption'>Caption:</label>
            <input type='text' autocomplete='off' name='caption' id='caption'>
            <button type='submit' class='btn btn-primary'>Save</button>
        </fieldset>
    </form>

@endsection