@extends('layouts.master')

@section('content')
    <form method='POST' action='{{ '/messages' }}'>
        @csrf
        <label for='subject'>Subject</label>
        <input type='text' autocomplete='off' autofocus id='subject' name='subject'>
        <label for='email'>Email(Optional, Enter if you want a response):</label>
        <input type='email' autocomplete='off' id='email' name='email'>
        <label for='body'>Question/Comment:</label>
        <textarea id='body' autocomplete='off' name='body'></textarea>
        <button type='submit' class='btn btn-login'>
            Submit
        </button>
    </form>
@endsection
