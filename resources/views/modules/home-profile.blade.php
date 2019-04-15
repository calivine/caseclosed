<section class='home-profile'>
    <p>
        {{ $victim->first_name }} {{ $victim->middle_name }} {{ $victim->last_name }}
    </p>
    <p>
        {{ $victim->description }}
    </p>
    @if (!is_null($image))
        <img src='{{ $image->url }}' alt='{{ $image->caption }}'>
    @endif
</section>


