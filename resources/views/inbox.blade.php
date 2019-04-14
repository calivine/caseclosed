@extends('layouts.master')

@section('content')
    <div class='container'>
        <ul>
            @foreach($messages as $message)
                <li>{{ $message->created_at }} <a href='{{ '/messages/'. $message->id }}'>{{ $message->subject }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection

