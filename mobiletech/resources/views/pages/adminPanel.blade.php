{{-- resources/views/pages/adminPanel.blade.php --}}
@extends('layouts.adminPanelLayout')


@section('Title')

<div class="row py-3 justify-content-between align-items-center">
            <div class="col-auto px-5">
                <h1 class="heading-color">{{$selectedCategory -> category_name}}</h1>
            </div>
            <div class="col-auto px-5">
                <!-- <button class="btn bg-white" href='{{ route('add-product.index', $selectedCategory -> category_name) }}'>
                    <i class="bi bi-plus"></i>
                    Pridať produkt
                </button> -->
                <a href="{{ route('add-product.index', $selectedCategory->category_name) }}" class="btn bg-white">
                    <i class="bi bi-plus"></i> Pridať produkt
                </a>
            </div>
    </div>


@endsection


@section('table')
<div class="container">
            <div class="table-responsive">
                <table class="table px-5">
                    <thead>
                        <tr>
                            <th scope="col">Názov</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Počet kusov</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock_quantity}}</td>
                            <td>
                                <a href="{{ route('products.show', $product) }}" class="btn">Zobraziť všetky parametre</a>
                            </td>           
                            <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
@endsection

@section('page_number')
<div class="row justify-content-center py-3">
            <div class="container d-flex justify-content-center">
                <i class="btn bi bi-arrow-left"></i>
                <span class="btn orange-text-color">1</span>
                <span class="btn">2</span>
                <span class="btn">3</span>
                <span>...</span>
                <span class="btn">10</span>
                <i class="btn bi bi-arrow-right"></i>
            </div>
        </div>
@endsection


@section('content')

    @yield('Title')
    @yield('table')
    
@endsection
