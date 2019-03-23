@extends('layouts.master')

@section('content')
    <div class='row'>
        <div class='col-3-4'>
            <section>
                <article>
                    <header>
                        <h2>
                            {{ $victim->first_name }} {{ $victim->middle_name }} {{ $victim->last_name }}
                        </h2>
                        @if($image != null)
                            @if($image->victim != null)
                                <img src='{{ $image->victim }}'
                                     alt='Victim profile picture'
                                     width='400px'
                                     height='450px'>
                            @endif
                        @endif
                    </header>
                    <p>Born: {{ $victim->date_of_birth->format('j F, Y') }}</p>
                    <p>
                        {{ $victim->description }}
                    </p>
                </article>
                <article>
                    <header>
                        <h2>
                            {{ $victim->perpetrator->first_name }} {{ $victim->perpetrator->last_name }}
                        </h2>
                    </header>
                    <p>
                        {{ $victim->perpetrator->description }}
                    </p>
                </article>
            </section>
        </div>
        <div class='col-1-4'>
            <aside>
                <h2>
                    Details
                </h2>
                <ul>
                    <li>
                        Crime commited by: {{ $victim->perpetrator->first_name }} {{ $victim->perpetrator->last_name }}
                    </li>
                    @if($image != null)
                        @if($image->perpetrator != null)
                            <img src='{{ $image->perpetrator }}'
                                 alt='Perpetrator picture' width='350px'>
                        @endif
                    @endif
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
                    <li>
                        Incident date: {{ $victim->incident_date->format('j F, Y') }}
                    </li>
                    <li>
                        Cause of death: {{ $victim->cause_of_death }}
                    </li>
                </ul>
            </aside>
        </div>
    </div>
    <div class='row'>
        <div class='col-3-4'>
            @foreach($sources as $url)
                @if($url != null)
                    <a href='{{ $url }}' target='_blank'>
                        {{ $url }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection
