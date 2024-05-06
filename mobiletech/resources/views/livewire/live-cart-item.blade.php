<div>
    @if($visibility)
        <article class="card shopping-cart-product-card back-ground-color m-2">
            <section class="row d-flex">

                <section class="col-6 col-sm-3  p-1 align-items-center justify-content-center"><img
                        src="{{asset('resources/phones/'.$image)}}" alt=""
                        class="img-fluid shopping-cart-product-image">

                </section>

                <section class="col-6 col-sm-3 align-items-center justify-content-center ">
                    <p class="card-text shopping-cart-product-name">
                        {{$name}}</p>
                </section>

                <section class=" col-12 col-sm-6  justify-content-center">
                    <section class="col-6 col-sm-6 align-items-center justify-content-center">
                        <input id="qinput" type="number" name="quantity" min="0" max="100" step="1"
                               value="{{$quantity}}" wire:model="volatile_quantity" wire:input.debounce.500ms="changeQuantity($event.target.value)">
                    </section>
                    {{--wire:model.debounce.500ms="quantityChanged"--}}
                    <section class="col-6 col-sm-6 align-items-center justify-content-center">

                        <section>
                            <span class="justify-content-center">{{$quantity*$price}}€</span>
                            <p class="justify-content-center remove-item"><a href="#" wire:click="discard">Odstrániť
                                    položku</a></p>
                        </section>
                    </section>
                </section>
            </section>

        </article>

    @endif
</div>
