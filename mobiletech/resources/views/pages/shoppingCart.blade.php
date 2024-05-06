@extends('layouts.buyingLayout')

@section('current_stage')
    @include('partials.shopping_cart_stage')
@endsection

@section('content')

    <section class="row mt-1 back-ground-white" id="shopping-cart-body">

        <section class="col-lg-4 back-ground-white p-1 order-lg-2 cart-summary">
            @livewire('order-summary', ['totalSum' => $totalSum])
        </section>


        <section class="col-lg-8  order-lg-1 back-ground-white p-0">
            @if(!is_null($cart))
                @foreach($cart as  $id => $product)
                    {{-- <x-shopping-cart-item :product="$product"></x-shopping-cart-item>--}}
                    @livewire('live-cart-item',  ['product_id' => $id, 'image' => $product['image'], 'quantity' =>
                    $product['quantity'], 'price' => $product['price'], 'name' => $product['name'] ])
                @endforeach
            @endif
        </section>
    </section>


    <script src="js/cartOrderSummary.js"></script>
@endsection
