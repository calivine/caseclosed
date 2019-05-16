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
                    <h1>
                        {{ $victim->perpetrator->first_name }} {{ $victim->perpetrator->last_name }}
                    </h1>
                </header>
                <div class='image-row profile-image'>
                    @foreach($victim->perpetrator->images as $image)
                        <div class='image-container'>
                            <img src='{{ $image->url }}'
                                 alt='{{ $image->caption }}'
                                 width='400px'
                                 height='450px'
                            >
                        </div>
                    @endforeach
                </div>
                <p>
                    {!! nl2br(e($victim->perpetrator->description)) !!}
                </p>
            </article>
        </section>
        <ul>
            @foreach($sources as $source)
                <li>
                    <a href='{{ $source->url }}' target='_blank'>
                        {{ $source->url }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
