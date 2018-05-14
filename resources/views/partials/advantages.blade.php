<div class="about-r row">
    @foreach($advantages as $advantage)
    <div class="about-col col-lg-3">
        <img src="{{URL::asset('images/'.$advantage->image)}}" alt="о магазине">
        <p class="text-center">{{ $advantage->title }}</p>
    </div>
    @endforeach
</div>