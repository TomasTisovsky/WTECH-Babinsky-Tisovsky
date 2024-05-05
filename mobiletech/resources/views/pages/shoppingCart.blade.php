@extends('layouts.buyingLayout')

@section('current_stage')
    @include('partials.shopping_cart_stage')
@endsection

@section('content')



    <section class="row mt-1 back-ground-white" id="shopping-cart-body">

        <section class="col-lg-4 back-ground-white p-1 order-lg-2 cart-summary">
            <section class="card" id="shopping-cart-order-sum">
                <section class="card-body back-ground-color">
                    <h3 class="text-align-center">Súčet objednávky</h3>
                    <p>Celková suma bez DPH:</p>
                    <p>255.66 €</p>
                    <p>DPH:</p>
                    <p> 0.0 €</p>
                    <p>Celková suma:</p>
                    <p>255.66 €</p>
                    <div class="justify-content-center pt-2">
                        <button class="btn" id="go-pay">Prejsť do pokladne</button>
                    </div>
                </section>
            </section>
        </section>


        <section class="col-lg-8  order-lg-1 back-ground-white p-0">
            @if(!is_null($cart))
                @foreach($cart as $product)
                    <x-shopping-cart-item :product="$product"></x-shopping-cart-item>
                @endforeach
            @endif
        </section>
    </section>

    <script src="js/cartOrderSummary.js"></script>
@endsection
