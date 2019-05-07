@extends('layouts.master')

@section('content')
    <header>
        <h1>
            {{ $victim->first_name }} {{ $victim->middle_name }} {{ $victim->last_name }}
        </h1>
        <div class='image-row profile-image'>
            @foreach($victim->images as $image)
                <div class='image-container'>
                    <img src='{{ $image->url }}'
                         alt='{{ $image->caption }}'
                         width='400px'
                         height='450px'
                    >
                </div>
            @endforeach
        </div>
    </header>
    <div class='profile'>
        <section>
            <article>
                @if($victim->date_of_birth)
                    <p>Born: {{ $victim->date_of_birth->format('j F, Y') }}</p>
                @endif
                <p>
                    {!! nl2br(e($victim->description)) !!}
                </p>
            </article>
            <article>
                <header>
                    <h2>
                        {{ $victim->perpetrator->first_name }} {{ $victim->perpetrator->last_name }}
                    </h2>
                </header>
                <p>
                    {!! nl2br(e($victim->perpetrator->description)) !!}
                </p>
            </article>
        </section>
        @foreach($sources as $source)
            <a href='{{ $source->url }}' target='_blank'>
                {{ $source->url }}
            </a>
        @endforeach
    </div>
@endsection
