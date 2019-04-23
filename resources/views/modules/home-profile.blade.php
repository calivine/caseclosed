<section class='home-profile'>
    <p>
        {{ $victim->first_name }} {{ $victim->middle_name }} {{ $victim->last_name }}
    </p>
    <p>
        {{ $victim->description }}
    </p>
    @foreach($victim->images as $image)
        <img src='{{ $image->url }}' alt='{{ $image->caption }}'>
    @endforeach
</section>


