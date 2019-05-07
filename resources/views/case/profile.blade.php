@extends('layouts.master')

@section('content')
    <div class='profile'>
        <section>
            <article>
                <header>
                    <h2>
                        {{ $victim->first_name }} {{ $victim->middle_name }} {{ $victim->last_name }}
                    </h2>
                    @foreach($victim->images as $image)
                        <img src='{{ $image->url }}'
                             alt='{{ $image->caption }}'
                             width='400px'
                             height='450px'
                        >
                    @endforeach
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
        <aside>
            <h2>
                Details
            </h2>
            <ul>
                <li>
                    Crime commited by: {{ $victim->perpetrator->first_name }} {{ $victim->perpetrator->last_name }}
                </li>
                @foreach($victim->perpetrator->images as $image)
                    <img src='{{ $image->url }}'
                         alt='{{ $image->caption }}'
                         width='400px'
                         height='450px'
                    >
                @endforeach
                <h4>
                    Victim(s)
                </h4>
                @foreach($victim->perpetrator->victims as $victimName)
                    <li>
                        @if(Request::is(substr('/profile/' . $victimName->last_name, 1)))
                            {{ $victimName->first_name }} {{ $victimName->last_name }}
                        @else
                            <a href='{{'/profile/' . $victimName->last_name }}'>
                                {{ $victimName->first_name }} {{ $victimName->last_name }}
                            </a>
                        @endif
                    </li>
                @endforeach
                @if($victim->incident_date)
                    <li>
                        Incident date: {{ $victim->incident_date->format('j F, Y') }}
                    </li>
                @endif
                <li>
                    Cause of death: {{ $victim->cause_of_death }}
                </li>
            </ul>
        </aside>
        @foreach($sources as $source)
            <a href='{{ $source->url }}' target='_blank'>
                {{ $source->url }}
            </a>
        @endforeach
    </div>
@endsection
