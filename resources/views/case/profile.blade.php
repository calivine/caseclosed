@extends('layouts.master')

@section('content')
    <div class='profile'>
        <section>
            <article>
                <header>
                    <h2>
                        {{ $victim->first_name }} {{ $victim->middle_name }} {{ $victim->last_name }}
                    </h2>
                    <div class='image-row'>
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
