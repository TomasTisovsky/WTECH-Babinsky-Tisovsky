{{-- resources/views/pages/adminPanelAddProduct.blade.php --}}
@extends('layouts.adminPanelLayout')



@section('content')
<main>
        <div class="container-fluid back-ground-color pb-5">
            <div class="container-md bg-white pb-5">
                <form id="addForm" class="container-md" enctype="multipart/form-data"  method="POST" action="{{ route('products.store', ['category' => $category]) }}">
                    @csrf  <!-- CSRF token is necessary for form security -->
                <div class="row mt-2">
                    <div class="col-6 col-md-5 col-lg-4 pl-5">Názov</div>
                    <div class="col-6 col-md-5 col-lg-4">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>

                    <div class="container-fluid">
                        <h2 class="pl-3">Obrázky</h2>
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


                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Popis</div>
                        <div class="col-6 col-md-5 col-lg-4">
                            <textarea class="form-control" name="description" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Cena</div>
                        <div class="col-6 col-md-5 col-lg-4">
                            <input type="text" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Počet kusov na sklade</div>
                        <div class="col-6 col-md-5 col-lg-4">
                            <input type="text" class="form-control" name="quantity">
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
                                        <select class="form-select w-100" name="{{ $parameter['name'] }}">
                                            @foreach ($parameter['options'] as $option)
                                                <option value="{{ $option }}">{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" class="form-control" name="{{ $parameter['name'] }}">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endforeach



                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center my-3">
                            <button type="submit" class="btn px-5 cart-btn">Pridať produkt</button>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center my-3">
                            <button class="btn  px-5 cart-btn" onclick="location.href='{{ route('admin.products.show', $category->category_name) }}'">Späť</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

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
