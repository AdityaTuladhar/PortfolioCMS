<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($sliders as $slider)
        <li data-target="#carouselIndicators" data-slide-to="{{ $loop->index }}" @if ($loop->index == 0)
            class="active"
            @endif ></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($sliders as $slider)
        <div class="carousel-item 
                @if ($loop->index == 0)
                    active
                @endif ">
            <img src="
                    @if(explode(':',$slider['source'])[0]=='https')				
                        {{ $slider['source'] }}
                    @else
                        {{ asset('storage/images/'.$slider['source']) }}
                    @endif
                    "
                class="carausel-image d-block 
                    @if ($loop->index%2 == 1)
                        carausel-image-right
                    @endif
                    w-100" alt="Slider Image">
            <div class="carausel-great-title 
                    @if ($loop->index % 2 ==0)
                        carausel-great-title-right
                    @else
                        carausel-great-title-left
                    @endif
                     h1">
                {{ $slider['alternate'] }}
            </div>
        </div>
        @endforeach
    </div>
    <div class="carousel-control-prev" type="button" data-target="#carouselIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </div>
    <div class="carousel-control-next" type="button" data-target="#carouselIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </div>
</div>