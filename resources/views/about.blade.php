@extends('layouts.master')

@section('content')
    <section class='container'>
        <div class='aboutContent'>
            <div class='row'>
                <p>Case Closed is creating an archive of murders and missing persons cases solved primarily through DNA
                    evidence</p>
            </div>
            <div class='row about-links'>
                <div class='col-1-6'>
                    <a class='message-btn' href='{{ '/messages/create' }}'><div class='_content'>MESSAGE</div></a>
                </div>
                <div class='col-1-2'>
                    If you have any questions, comments, corrections, or find want to report bugs/errors.
                </div>
            </div>
            <div class='row about-links'>
                <div class='col-1-6'>
                    <a class='donate-btn' href='{{ url('https://www.paypal.me/bytlg') }}'><div class='_content'>DONATE</div></a>
                </div>
                <div class='col-1-2'>
                    Want to support the project?
                </div>
            </div>
            <div class='row about-links'>
                <div class='col-1-6'>
                    <a class='message-btn' href='{{ url('https://github.com/calivine/caseclosed') }}'><div class='_content'>CODE</div></a>
                </div>
                <div class='col-1-2'>
                    Case Closed is open source.
                </div>
            </div>
        </div>
    </section>
@endsection

