@extends('layouts.master')

@section('content')
    <h1>Admin Portal</h1>
    <div class='row'>
        <div class='col-1-4'>
            <a href='{{ '/new' }}'>Create New Case</a>
        </div>
        <div class='col-1-4'>
            <ul>
                @foreach($perpetrators as $perpetrator)
                    <li>
                        <a href='{{ '/case-dashboard/' . $perpetrator->id }}'>{{ $perpetrator->first_name }} {{ $perpetrator->last_name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
