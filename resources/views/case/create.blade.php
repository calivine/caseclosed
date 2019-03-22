@extends('layouts.master')

@section('content')
    <div class='row'>
        <div class='col-1-3'>
            <form class='add-input' method='POST' action='{{ '/create' }}'>
                {{ csrf_field() }}
                <fieldset>
                    <legend>
                        Add New Perpetrator
                    </legend>
                    <label for='perp_name'>Perpetrator Name</label>
                    <input type='text' autocomplete='off' name='perp_name' id='perp_name'>

                    <label for='perp_dob'>Date of Birth:(format:YYYY-MM-DD)</label>
                    <input type='text' autocomplete='off' name='perp_dob' id='perp_dob'>

                    <label for='perp_arrest'>Date of Arrest:(format:YYYY-MM-DD)</label>
                    <input type='text' autocomplete='off' name='perp_arrest' id='perp_arrest'>

                    <label for='perp_death'>Date of Death:(format:YYYY-MM-DD)</label>
                    <input type='text' autocomplete='off' name='perp_death' id='perp_death'>

                    <label for='perp_details'>Perpetrator Details</label>
                    <input type='text' autocomplete='off' name='perp_details' id='perp_details'>
                </fieldset>
                <button type='submit' class='btn btn-primary'>Save</button>
            </form>
        </div>
    </div>



@endsection