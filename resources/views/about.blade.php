@extends('layouts.master')

@section('content')
    <section class='about-section'>
        <p>Case Closed is creating an archive of murders and missing persons cases solved primarily through DNA
            evidence</p>
        <p>If you have any questions, comments, corrections, or find want to report bugs/errors. Leave us a message
            <a href='{{ '/messages/create' }}'>here</a>. If you have any suggestions for additions to the database.
            You can also submit them here until the <a href='{{ url('https://forums.pitchforked.net') }}'>forums</a> are complete.</p>
    </section>

@endsection
