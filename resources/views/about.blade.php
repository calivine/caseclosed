@extends('layouts.master')

@section('content')
    <section class='container'>
        <div class='aboutContent'>
            <div class='row'>
                <p>Case Closed is creating an archive of murders and missing persons cases solved primarily through DNA
                    evidence</p>
            </div>
            <div class='row'>
                <div class='col-1-8 btn-link'>
                    <a href='{{ '/messages/create' }}'>Message</a>
                </div>
                <div class='col-1-2'>
                    <p>If you have any questions, comments, corrections, or find want to report bugs/errors. </p>
                </div>
            </div>
            <div class='row'>
                <div class='col-1-8 btn-link'>
                    <a href='{{ url('https://www.paypal.me/bytlg') }}'>Donate.</a>
                </div>
                <div class='col-1-2'>
                    <p>Want to support the project?</p>
                </div>
            </div>
            <div class='row'>
                <div class='col-1-8 btn-link'>
                    <a href='{{ url('https://github.com/calivine/caseclosed') }}'>Code.</a>
                </div>
                <div class='col-1-2'>
                    <p>Case Closed is open source.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

