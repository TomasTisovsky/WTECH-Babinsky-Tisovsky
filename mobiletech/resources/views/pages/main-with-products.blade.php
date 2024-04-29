
@extends('layouts.mainLayout')

@section('content')

    @foreach($products as $product)
        <div class="col-sm-6 col-md-6 col-lg-4 product-col">
           <x-product-card :name="$product->name" :price="$product->price"></x-product-card>
        </div>
    @endforeach

@endsection
