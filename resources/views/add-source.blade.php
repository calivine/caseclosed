@extends('layouts.master')

@section('content')
    <h1>Sources</h1>
    <form method='POST' action='{{ '/process-source/' . $id }}'>
        {{ csrf_field() }}
        <label for='source1'>Source 1:</label>
        <input type='text' autocomplete='off' name='source1' id='source1'>
        <label for='source2'>Source 2:</label>
        <input type='text' autocomplete='off' name='source2' id='source2'>
        <label for='source3'>Source 3:</label>
        <input type='text' autocomplete='off' name='source3' id='source3'>
        <label for='source4'>Source 4:</label>
        <input type='text' autocomplete='off' name='source4' id='source4'>
        <label for='source5'>Source 5:</label>
        <input type='text' autocomplete='off' name='source5' id='source5'>
        <button type='submit' class='btn btn-primary'>Save</button>
    </form>


@endsection
