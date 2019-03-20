<section id='home-profile'>
    <p class='homepage-subtitle'>Perpetrator</p>
    <p>
        {{ $perpetrator->first_name }} {{ $perpetrator->middle_name }} {{ $perpetrator->last_name }}
    </p>
    <ul>
        <li>
            Date of Arrest, Death, or Other Outcome: {{ $perpetrator->arrest_date->format('j F, Y') }}
        </li>
    </ul>
    <p class='homepage-subtitle'>Victims</p>
    @foreach($perpetrator->victims as $victim)
        <p>
            {{ $victim->first_name }} {{ $victim->middle_name }} {{ $victim->last_name }}
        </p>
        <ul>
            <li>
                DOB: {{ $victim->date_of_birth->format('j F, Y') }}
            </li>
            <li>
                Gender:
                @if($victim->gender == 'F')
                    Female
                @else
                    Male
                @endif
            </li>
            <li>
                Cause of death: {{ $victim->cause_of_death }}
            </li>
        </ul>
    @endforeach
</section>


