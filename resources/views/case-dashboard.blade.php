@extends('layouts.master')

@section('content')
    <div class='row'>
        <div class='col-1-4'>
            <ul>
                <li>
                    <a href='{{ '/add-victim/' . $perpetrator->id }}'>
                        <i class='fas fa-user-plus'></i></a>
                    Victim
                </li>
                <li>
                    <a href='{{ '/add-source/' . $perpetrator->id }}'>
                        <i class='fas fa-plus'></i></a>
                    Sources
                </li>
                <li>
                    <a href='{{ '/add-images/' . $perpetrator->id }}'>
                        <i class='fas fa-plus'></i></a>
                    Images
                </li>
            </ul>
        </div>
    </div>
    <div class='row'>
        <div class='col-1-4'>
            <ul>
                @foreach($perpetrator->victims as $victim)
                    <li class='nameplate'>
                        <span class='nameplate-contents'>{{ $victim->first_name }} {{ $victim->last_name }}</span>
                        <a class='nameplate-icon' href='{{ '/update-victim/' . $victim->id }}'>
                            <i class='fas fa-user-edit'></i>
                        </a>
                        <a class='nameplate-contents' href='{{ '#' }}'>
                            <i class='fas fa-trash'></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
