<div id="carouselExampleIndicators" class="carousel slide carousel-width">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active"
                aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">



        @for($i = 0; $i < count($images); $i ++)
            @if($i ==0)
                <div class="carousel-item active">
                    <img src="{{asset('resources/phones/'.$images[$i]->name)}}" class="d-block w-100" alt="...">
                </div>
            @else
                <div class="carousel-item">
                    <img src="{{asset('resources/phones/'.$images[$i]->name)}}" class="d-block w-100" alt="...">
                </div>
            @endif

        @endfor


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
