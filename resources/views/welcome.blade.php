@extends('layouts.master')

@section('content')
    <div class='welcome-background'>
        <div class='row'>
            <div class='col-1-3'>
                @include('victims.home-profile')
            </div>
        </div>
    </div>
@endsection
