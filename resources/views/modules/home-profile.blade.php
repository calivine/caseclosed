<section class='home-profile'>
<!--
    <p>
        {{ $victim->first_name }} {{ $victim->middle_name }} {{ $victim->last_name }}
        </p> -->
    @if(!is_null($profileImage))
        <img src='{{ $profileImage->url }}' alt='{{ $profileImage->caption }}'>
    @endif
    <p>
        {!! nl2br(e($victim->description)) !!}
    </p>

</section>


