<div class="card product-card ">
    <div class="card-body  product-card-main-page modified-card-body">
        <p class="card-text card-product-name">
            {{$name}}</p>
        {{--<img class="img-fluid card-main-image card-image-top p-0" src="{{asset($image)}}"
             alt="mobil fotografia">--}}

        <div class="row container-fluid p-0">
            <div class="col-6 d-flex card-button-col">
                <button class="btn add-to-cart-btn">
                      <span><img src="{{asset('resources/icons/shopping_cart_plus.svg')}}" alt="nakupny kosik"
                                 class="shopping-card-plus"></span>
                </button>
            </div>
            <div class="col-6 d-flex price-button-col ">
                <p class="price-tag">{{$price}}€</p>
            </div>
        </div>
    </div>
</div>

