<div class="card product-card ">
    <div class="card-body  product-card-main-page modified-card-body">

        <a class="product-card-name-anchor" href="{{ route('product-detail.show', ['product_id' => $product->product_id]) }}"><p class="card-text card-product-name">
                {{$name}}</p></a>

        <a class="product-card-image-anchor" href="{{ route('product-detail.show', ['product_id' => $product->product_id]) }}"><img class="img-fluid card-main-image card-image-top p-0" src="{{asset('resources/phones/'.$image)}}"
                alt="mobil fotografia"></a>

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

