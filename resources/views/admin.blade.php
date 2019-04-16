@extends('layouts.master')

@section('content')
    <h1 class='subtitle'>Admin Portal</h1>
    @if ($messages != null)
        <h2><a href='{{ '/messages/inbox' }}'>Unread Messages!</a></h2>
    @endif
    <nav>
        <ul>
            <li><a class='run-process' href='{{ '/case/new' }}'>Create New Case</a></li>
            <li><a href='{{ '/messages/inbox' }}'>Messages</a></li>
        </ul>
    </nav>
    <ul class='cases'>
        @foreach($perpetrators as $perpetrator)
            <li class='nameplate'>
                <a class='nameplate-contents'
                   href='{{ '/case-dashboard/' . $perpetrator->id }}'>{{ $perpetrator->first_name }} {{ $perpetrator->last_name }}</a>
                <a class='nameplate-icon' href='{{ '/case/'. $perpetrator->id . '/edit' }}'>
                    <i class='fas fa-user-edit'></i>
                </a>
                <a class='nameplate-contents' href='{{ '/case/' . $perpetrator->id . '/delete' }}'>
                    <i class='fas fa-trash'></i>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
