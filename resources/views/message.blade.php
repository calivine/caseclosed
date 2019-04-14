@extends('layouts.master')

@section('content')
    <div class='container'>
        <h2>{{ $message->subject }}</h2>
        <p>{{ $message->body }}</p>
    </div>
@endsection
