@if(!empty($sliders))
<div class="banner-home owl-carousel">
    @foreach($sliders as $slide)
    <div class="item">
        <img src="{{asset($slide)}}" alt="banner">
    </div>
    @endforeach
</div>
@endif