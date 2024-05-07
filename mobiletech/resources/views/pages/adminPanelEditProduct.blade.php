{{-- resources/views/pages/adminPanelEditProduct.blade.php --}}
@extends('layouts.adminPanelLayout')

@section('content')
    <main>
        <div class="container-fluid back-ground-color pb-5">
            <div class="container-md bg-white pb-5">
            <form id="editForm" class="container-md" enctype="multipart/form-data"  method="POST" action="{{ route('products.update',$product) }}">
            @csrf  <!-- CSRF token is necessary for form security --> 
            @method('PUT')  <!-- This line simulates a PUT request -->   
                <div class="row mt-2">
                    <div class="col-6 col-md-5 col-lg-4 pl-5">Názov</div>
                    <div class="col-6 col-md-5 col-lg-4">
                        <input type="text" class="form-control" name="name" value = "{{ $product['name']  }}" required>
                    </div>
                </div>


                <div class="container-fluid mt-4">
                    <h2>Obrázky</h2>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="horizontal-scroll">
                            @foreach($images as $image)
                            <div class="image-card" data-id="{{ $image->id }}">
                                <div class="card">
                                    <img src="{{ asset('resources/phones/' . $image->image_name) }}" class="card-img-top" alt="Image Description">
                                    <div class="card-body text-center">
                                        <!-- Hidden input to keep track of deletion status -->
                                        <input type="hidden" name="deleted_images[]" value="" data-image-input-id="{{ $image->id }}">
                                        <!-- Adjusted button to call markForDeletion -->
                                        <button type="button" class="btn btn-danger btn-sm" onclick="markForDeletion({{ $image->id }})">Odstrániť</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    
                    <div class="row mt-2 justify-content-center">
                        <div class="col-8">
                                <div class="row m-4">
                                    <div class="col-12">
                                        <h4>Pridať nové obrázky</h4>
                                        <input type="file" class="form-control-file" name="images[]" id="images"
                                            multiple accept="image/*">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Popis</div>
                        <div class="col-6 col-md-5 col-lg-4">
                            <textarea class="form-control" name="description" rows="4" >{{ $product['description']  }}</textarea>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Cena</div>
                        <div class="col-6 col-md-5 col-lg-4">
                            <input type="text" class="form-control" name="price" value="{{ $product['price']  }}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Počet kusov na sklade</div>
                        <div class="col-6 col-md-5 col-lg-4">
                            <input type="text" class="form-control" name="quantity" value="{{ $product['stock_quantity']  }}">
                        </div>
                    </div>
                    
                    @foreach ($subCategoriesWithParameters as $subCategory => $parameters)
                        <div class="container-fluid">
                            <h2 class="pl-3">{{ $subCategory }}</h2>
                        </div>
                        @foreach ($parameters as $parameter)
                            <div class="row mt-2">
                                <div class="col-6 col-md-5 col-lg-4 pl-5">{{ $parameter['name'] }}</div>
                                <div class="col-6 col-md-5 col-lg-4">
                                    @if (isset($parameter['options']))
                                        <select class="form-select w-100" name="parameters[{{ $parameter['id'] }}]">
                                            @foreach ($parameter['options'] as $option)
                                                <option value="{{ $option }}">{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" class="form-control" name="parameters[{{ $parameter['id'] }}]" value = "{{ $parameter['value']  }}" >
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center my-3">
                            <button type="submit" class="btn  px-5 cart-btn">Uložiť zmeny</button>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center my-3">
                            <a href="{{ url()->previous() }}" class="btn  px-5 cart-btn">Späť</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
    function markForDeletion(imageId) {
    const card = document.querySelector(`.image-card[data-id="${imageId}"]`);
    const input = document.querySelector(`input[data-image-input-id="${imageId}"]`);

    if (card && input) {
        card.style.display = 'none'; // This hides the card visually
        input.value = imageId; // This sets the image ID as the value to mark it for deletion
    }
}
</script>
    @yield('scripts')
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>   
         
@endsection
