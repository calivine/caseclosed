<section class='home-profile'>
    <p>
        {{ $victim->first_name }} {{ $victim->middle_name }} {{ $victim->last_name }}
    </p>
    @if($profileImage)
        <img src='{{ $profileImage->url }}' alt='{{ $profileImage->caption }}' width='450px' height='600px'>
    @endif
    <p>
        {!! nl2br(e($victim->description)) !!}
    </p>
</section>


