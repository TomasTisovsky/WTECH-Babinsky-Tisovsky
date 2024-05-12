@extends('layouts.layout')

@section('content')
    <div class="container-fluid back-ground-color">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="container my-5 justify-content-center">
                    <x-image-carousel :images="$product_images"></x-image-carousel>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="container my-5">
                    <ul class="list-no-bullets">
                        <li>
                            <div class="container">
                                <h1>{{$product_parameters->first()->name}}</h1>
                            </div>
                        </li>
                        <li>
                            <div class="container my-5 py-3 px-3 bg-white rounded-4">
                                <div class="container back-ground-color rounded-4 px-4 py-3">
                                    <h1 class="pb-2">Popis produktu</h1>
                                    <p>{{$product_parameters->first()->description}}</p>
                                    <h1 class="py-2">Parametre</h1>
                                    @for($i = 0; $i < 2; $i++)
                                        <div class="row">
                                            <div class="col-6">{{$product_parameters[$i]->scp_name}}</div>
                                            <div class="col-6">{{$product_parameters[$i]->value}}</div>
                                        </div>
                                    @endfor
                                    <button class="btn btn-link p-0 text-decoration-none" type="button"
                                            data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasParameters" aria-controls="offcanvasParameters">
                                        Zobraziť všetky parametre
                                    </button>
                                    <div class="text-end px-3">
                                        <h1>{{$product_parameters->first()->price}}€</h1>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>


                            @livewire('add-to-cart-quantity',['product_id' => $product_parameters->first()->product_id, 'image' => $product_images[0]->image_name, 'price' =>$product_parameters->first()->price, 'name' => $product_parameters->first()->name ])


                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('offcanvas')

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasParameters"
         aria-labelledby="offcanvasParametersLabel">
        {{--<div class="offcanvas-header">
            <h3 id="offcanvasParametersLabel">Všetky parametre</h3>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>--}}
        <div class="offcanvas-body">

            @php
                // zoberie sa id prvej subkategorie
                $previous_subcategory_id = $product_parameters->first()->sub_category_id;
            @endphp

            <div class="row">
                <h4>{{$product_parameters->first()->sub_category_name}}</h4>
            </div>

            @foreach($product_parameters as $parameter)

                @php
                    if ($parameter->sub_category_id != $previous_subcategory_id){
                        echo "<h4>{$parameter->sub_category_name}</h4>";
                        $previous_subcategory_id = $parameter->sub_category_id;
                    }

                @endphp


                <div class="row">
                    <div class="col-6">{{$parameter->scp_name}}</div>
                    <div class="col-6">{{$parameter->value}}</div>
                </div>
            @endforeach

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

@endsection
