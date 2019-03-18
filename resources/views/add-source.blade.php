@extends('layouts.master')

@section('content')
    <h1>Sources</h1>
    <form method='POST' action='{{ '/process-source/' . $perpetrator->id }}'>
        {{ csrf_field() }}
        <label for='source1'>Source 1:</label>
        <input type='text' autocomplete='off' name='source1' id='source1' value='{{ isset($perpetrator->source->url1) ? $perpetrator->source->url1 : ''}}'>
        <label for='source2'>Source 2:</label>
        <input type='text' autocomplete='off' name='source2' id='source2' value='{{ isset($perpetrator->source->url2) ? $perpetrator->source->url2 : ''}}'>
        <label for='source3'>Source 3:</label>
        <input type='text' autocomplete='off' name='source3' id='source3' value='{{ isset($perpetrator->source->url3) ? $perpetrator->source->url3 : ''}}'>
        <label for='source4'>Source 4:</label>
        <input type='text' autocomplete='off' name='source4' id='source4' value='{{ isset($perpetrator->source->url4) ? $perpetrator->source->url4 : ''}}'>
        <label for='source5'>Source 5:</label>
        <input type='text' autocomplete='off' name='source5' id='source5' value='{{ isset($perpetrator->source->url5) ? $perpetrator->source->url5 : ''}}'>
        <button type='submit' class='btn btn-primary'>Save</button>
    </form>


@endsection
