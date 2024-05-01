<article class="card shopping-cart-product-card back-ground-color m-2">
    <section class="row d-flex">

        <section class="col-6 col-sm-3  p-1 align-items-center justify-content-center"><img
                src="{{asset('resources/phones/'.$image->name_hash)}}" alt=""
                class="img-fluid shopping-cart-product-image">

        </section>

        <section class="col-6 col-sm-3 align-items-center justify-content-center ">
            <p class="card-text shopping-cart-product-name">
                {{$product->name}}</p>
        </section>

        <section class="col-6 col-sm-3 align-items-center justify-content-center">
            <input type="number" name="quantity" min="{{$quantity}}" max="100" step="1" value="1">
        </section>

        <section class="col-6 col-sm-3 align-items-center justify-content-center">

            <section>
                <span class="justify-content-center">{{$quantity*$product->price}}€</span>
                <p class="justify-content-center remove-item"><a href="#">Odstrániť
                        položku</a></p>
            </section>

        </section>
    </section>
</article>
