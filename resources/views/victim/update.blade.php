@extends('layouts.master')

@section('content')
    <div class='row'>
        <div class='col-3-3'>
            <form method='POST' action='{{ '/victim/' . $victim->id }}'>
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                <fieldset>
                    <label for='victim_name'>Victim Name:</label>
                    <input type='text' autocomplete='off' name='victim_name' id='victim_name' value='{{ $victim->first_name }} {{ $victim->last_name }}'>

                    <label for='dob'>Date of Birth:(format:YYYY-MM-DD)</label>
                    <input type='text' autocomplete='off' name='date_of_birth' id='dob'>

                    <label for='gender'>Gender</label>
                    <select name='gender' id='gender'>
                        <option value='F'>Female</option>
                        <option value='M'>Male</option>
                    </select>

                    <label for='incident_date'>Date of Disappearance/Incident:</label>
                    <input type='text' autocomplete='off' name='incident_date' id='incident_date'>

                    <label for='cause_of_death'>Cause of Death:</label>
                    <input type='text' autocomplete='off' name='cause_of_death' id='cause_of_death' value='{{ $victim->cause_of_death }}'>

                    <label for='details'>Details:</label>
                    <textarea autocomplete='off' name='description' id='details' rows='5' cols='45'>{{ $victim->description }}</textarea>
                    <label for='location'>Location:</label>
                    <input type='text' autocomplete='off' name='location' id='location' value='{{ $victim->location }}'>

                    <button type='submit' class='btn btn-primary'>Save Changes</button>
                </fieldset>
            </form>
        </div>
    </div>


@endsection