<section>
    <p>
        Name: {{ $victim->first_name  }} {{ $victim->middle_name }}  {{ $victim->last_name }}<br>
        Gender: {{ $victim->gender }}<br>
        Age at time of incident: {{ $victim->age }}
    </p>
    <p>
        {{ $victim->detail }}
    </p>
</section>
<section>
    <p>
        Perpetrator: {{ $perp->first_name }} {{ $perp->last_name }}
    </p>
    <p>
        Arrested On: {{ $perp->arrest_date }}
    </p>
</section>
<a href='{{ $victim->url }}'>Source</a>
