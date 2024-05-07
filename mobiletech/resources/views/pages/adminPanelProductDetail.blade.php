{{-- resources/views/pages/adminPanelProductDetail.blade.php --}}
@extends('layouts.adminPanelLayout')


@section('content')

    <main>
            <div class="container-fluid back-ground-color">
                <div class="container-md bg-white px-5">
                    <div class="container-fluid py-3 pl-4">
                        <h1>{{ $product->name }}
                        </h1>
                    </div>

                    <div class="row justify-content-center py-5">
                        <div class="col-12 col-md-8 col-lg-4 w-25">
                            <div class="container">
                                <div id="carouselExampleIndicators" class="carousel slide">
                                    <div class="carousel-inner">
                                        @foreach ($product->images as $image)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                <img src="{{ asset('resources/phones/' . $image->image_name) }}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Popis</div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <p> {{ $product->description }} </p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Cena</div>
                        <div class="col-6 col-md-5 col-lg-4">{{ $product->price }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Počet kusov na sklade</div>
                        <div class="col-6 col-md-5 col-lg-4">{{ $product->stock_quantity }}</div>
                    </div>


                    @foreach ($subCategoriesWithParameters as $subCategory => $parameters)
                        <div class="container-fluid">
                            <h2 class="pl-3">{{ $subCategory }}</h2>
                        </div>
                        @foreach ($parameters as $parameter)
                            <div class="row mt-2">
                                <div class="col-6 col-md-5 col-lg-4 pl-5">{{ $parameter['name'] }}</div>
                                <div class="col-6 col-md-5 col-lg-4">{{ $parameter['value'] }}</div>
                            </div>
                        @endforeach
                    @endforeach

                    <div class="row justify-content-center">
                        <div class="col-4 justify-content-center">
                            <a class="btn  my-5 px-5 cart-btn" href="{{ url()->previous() }}">Späť</a>
                        </div>

                    </div>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>          
@endsection
