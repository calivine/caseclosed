<section class='home-profile'>
    <p>
        {{ $victim->first_name }} {{ $victim->middle_name }} {{ $victim->last_name }}
    </p>
    <p>
        {{ $victim->description }}
    </p>
    @if(!is_null($profileImage))
        <img src='{{ $profileImage->url }}' alt='{{ $profileImage->caption }}'>
    @endif
</section>


