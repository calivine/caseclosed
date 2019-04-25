@extends('layouts.master')

@section('content')
    <div class='form-container'>
        <h2>Case / Perpetrator Details</h2>
        <form class='add-input' method='POST' action='{{ '/create' }}'>
            {{ csrf_field() }}
                <label for='perp_name'>Perpetrator Name*</label>
                <input type='text' autocomplete='off' name='perp_name' id='perp_name'>

                <label for='perp_arrest'>Date of Arrest:(format:YYYY-MM-DD)*</label>
                <input type='text' autocomplete='off' name='arrest_date' id='perp_arrest'>

                <label for='description'>Perpetrator Details*</label>
                <textarea name='description' id='description' cols='50' rows='15'></textarea>

                <label for='perp_dob'>Date of Birth:(format:YYYY-MM-DD)</label>
                <input type='text' autocomplete='off' name='date_of_birth' id='perp_dob'>

                <label for='perp_death'>Date of Death:(format:YYYY-MM-DD)</label>
                <input type='text' autocomplete='off' name='date_of_death' id='perp_death'>
            <button type='submit' class='btn btn-primary'>Save</button>
        </form>
    </div>
@endsection