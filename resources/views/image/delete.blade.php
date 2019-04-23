@extends('layouts.master')

@section('title')
    Delete Image
@endsection

@section('content')
    <section class='confirm-delete'>
        <div class='confirm-delete-content'>
            <p>
                Are you sure you want to delete this image?
            </p>
            <form method='POST' action='/image/{{ $image->id }}'>
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <input type='submit' value='Confirm'>
            </form>
            <a href='{{ '/admin' }}'>Cancel and Return</a>
        </div>
    </section>
@endsection