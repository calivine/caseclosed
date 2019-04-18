@extends('layouts.master')

@section('content')
    <form method='POST' action='{{ '/case/' . $perpetrator->id }}'>
        {{ csrf_field() }}
        {{ method_field('PUT')}}
        <fieldset>
            <label for='perp_name'>Perpetrator Name:</label>
            <input type='text' autocomplete='off' name='perp_name' id='perp_name' value='{{ $perpetrator->first_name }} {{ $perpetrator->last_name }}'>

            <label for='dob'>Date of Birth:(format:YYYY-MM-DD)</label>
            <input type='text' autocomplete='off' name='date_of_birth' id='dob' value='{{ $perpetrator->date_of_birth->format('Y-m-d') }}'>

            <label for='arrest'>Date of Arrest:(format:YYYY-MM-DD)</label>
            <input type='text' autocomplete='off' name='arrest_date' id='arrest' value='{{ $perpetrator->arrest_date->format('Y-m-d') }}'>

            <label for='death'>Date of Death:(format:YYYY-MM-DD)</label>
            <input type='text' autocomplete='off' name='date_of_death' id='death' value='{{ $perpetrator->date_of_death }}'>

            <label for='description'>Perpetrator Details</label>
            <textarea autocomplete='off' name='description' id='description' rows='5' cols='45'>{{ $perpetrator->description }}</textarea>

            <button type='submit' class='btn btn-primary'>Update</button>
        </fieldset>
    </form>


@endsection

