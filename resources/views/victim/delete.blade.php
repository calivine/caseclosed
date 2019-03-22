@extends('layouts.master')

@section('title')
    Delete Victim
@endsection

@section('content')
    <p>
        Are you sure you want to delete this Victim?
    </p>
    <form method='POST' action='/victim/{{ $victim->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Delete'>
    </form>
    <a href='/case-dashboard/{{ $victim->perpetrator->id }}'>Cancel and Return</a>
@endsection