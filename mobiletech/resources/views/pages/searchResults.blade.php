@extends('layouts.searchResultsLayout')

@section('content')


<form id="filter-form">
<input type="hidden" name="search" value="{{ $search ?? '' }}">
<div class="row">
  
    <!-- filter -->
    <div class="col-12 col-lg-3">
      
      @csrf
          <div class="container bg-white filter rounded-bottom-5">

            <div class="row justify-content-center">
              <!-- Button trigger for collapsible -->
              <button class="btn category-btn w-75" type="button" data-bs-toggle="collapse"
                data-bs-target="#categoriesCollapse" aria-expanded="false" aria-controls="categoriesCollapse">
                Vyberte si kategóriu
              </button>

              <div class="collapse" id="categoriesCollapse">
                <div class="card card-body">
                  <div class="btn-group-vertical aside-buttons">
                    <button type="button" class="btn category-button" data-category="1">
                          <span>
                              <img src="{{ asset('resources/icons/smartphones_icon.svg') }}" alt="Mobilné telefóny ikonka" class="img-fluid">
                              <span>Mobilné telefóny</span>
                          </span>
                          </button>
                      <button type="button" class="btn category-button" data-category="2">
                          <span>
                              <img src="{{ asset('resources/icons/tablets_icon.svg') }}" alt="Tablety ikonka" class="img-fluid">
                              <span>Tablety</span>
                          </span>
                          </button>
                      <button type="button" class="btn category-button" data-category="3">
                          <span>
                              <img src="{{ asset('resources/icons/protective_glass_icon.svg') }}" alt="Sklá a fólie ikonka" class="img-fluid">
                              <span>Sklá a fólie</span>
                          </span>
                          </button>
                      <button type="button" class="btn category-button" data-category="4">
                          <span>
                              <img src="{{ asset('resources/icons/accesories_icon.svg') }}" alt="Príslušenstvo ikonka" class="img-fluid">
                              <span>Príslušenstvo</span>
                          </span>
                          </button>
                      <button type="button" class="btn category-button" data-category="5">
                          <span>
                              <img src="{{ asset('resources/icons/tablets_icon.svg') }}" alt="Kryty a obaly ikonka" class="img-fluid">
                              <span>Kryty a obaly</span>
                          </span>
                          </button>
                          <input type="hidden" id="category-select" name="categoryID" value="{{ $categoryID ?? '' }}">
                  </div>
                </div>
              </div>

              <!-- Information text -->
              <div class="text-muted mt-3 text-center">
                (Zobrazuje sa 1265 položiek)
              </div>
            </div>

            <!-- Price Filter -->
            <div class="mb-3">
              <h5 class="mb-3 pt-3">
                <label for="priceFilter" class="form-label">Cena</label>
              </h5>
              <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="Od" name="minimum_price" value="{{ $minimum_price ?? '' }}">
                <input type="number" class="form-control" placeholder="Do" name="maximum_price" value="{{ $maximum_price ?? '' }}">
                <button class="btn btn-outline-secondary " type="button" id="price-filter-btn">Ok</button>
              </div>
            </div>
            <hr class="section-divider">

            <!-- Brand Filter -->
            <div class="mb-3">
              <h5>
                <label for="brandFilter" class="form-label">Značka</label>
              </h5>

              <div class="form-checks">
              @php
                $displayCount = 5; // Počet značiek, ktoré sa majú zobraziť mimo collapse
              @endphp
                  @foreach ($brands as $index => $brand)
                    @if ($index < $displayCount)
                      <!-- Zobrazenie prvých 5 značiek mimo collapse -->
                      <div class="form-check">
                        <input class="form-check-input border border-black" type="checkbox"  name="brands[]" value="{{ $brand }}" id="brand{{ $brand }}">
                        <label class="form-check-label" for="brand{{ $brand }}">
                          {{ $brand }}
                        </label>
                      </div>
                    @else
                      @if ($index == $displayCount)
                        <!-- Tlačidlo pre rozbalenie ostatných značiek -->
                        <div class="row justify-content-center">
                          <button class="btn btn-link p-0 text-decoration-none " type="button" data-bs-toggle="collapse"
                            data-bs-target="#moreBrands" aria-expanded="false" aria-controls="moreBrands">
                            Zobraziť všetky parametre
                          </button>
                        </div>
                        <div class="collapse" id="moreBrands">
                          @endif

                          <!-- Značky v rozbaliteľnej časti -->
                          <div class="form-check">
                            <input class="form-check-input border border-black" type="checkbox" name="brands[]" value="{{ $brand }}" id="brand{{ $brand }}">
                            <label class="form-check-label" for="brand{{ $brand }}">
                              {{ $brand }}
                            </label>
                          </div>

                          @if ($index == count($brands) - 1)
                            </div> <!-- Zatvorenie collapse -->
                          @endif
                        @endif
                  @endforeach
                  
              </div>
            </div>

            <hr class="section-divider">

            <!-- Color Filter -->
            <div class="mb-3">
              <h5>
                <label for="colorFilter" class="form-label">Farba</label>
              </h5>

              <div class="form-checks">
                @php
                  $displayCount = 5; // Počet farieb, ktoré sa majú zobraziť mimo collapse
                @endphp
                @foreach ($colors as $index => $color)
                  @if ($index < $displayCount)
                    <!-- Zobrazenie prvých 5 farieb mimo collapse -->
                    <div class="form-check">
                      <input class="form-check-input border border-black" type="checkbox" name="colors[]" value="{{ $color }}" id="color{{ $color }}">
                      <label class="form-check-label" for="color{{ $color }}">
                        {{ $color }}
                      </label>
                    </div>
                  @else
                    @if ($index == $displayCount)
                      <!-- Tlačidlo pre rozbalenie ostatných farieb -->
                      <div class="row justify-content-center">
                        <button class="btn btn-link p-0 text-decoration-none " type="button" data-bs-toggle="collapse"
                          data-bs-target="#moreColors" aria-expanded="false" aria-controls="moreColors">
                          Zobraziť všetky parametre
                        </button>
                      </div>
                      <div class="collapse" id="moreColors">
                    @endif

                    <!-- Farby v rozbaliteľnej časti -->
                    <div class="form-check">
                      <input class="form-check-input border border-black" type="checkbox" name="colors[]" value="{{ $color }}" id="color{{ $color }}">
                      <label class="form-check-label" for="color{{ $color }}">
                        {{ $color }}
                      </label>
                    </div>

                    @if ($index == count($colors) - 1)
                      </div> <!-- Zatvorenie collapse -->
                    @endif
                  @endif
                @endforeach
              </div>
            </div>

            <div class="row justify-content-center pb-5 pt-2">
                <button id="filter-button" class="btn orange-btn w-75 mt-3">Použiť filtre</button>
            </div>
          </div>
         
        </div>

 
      
      <div class="col-12 col-lg-9">
        <div class="container">
          <h1 class="p-3 default-title">{{$category_name}}</h1>
          <div class="container bg-white rounded-4 mx-3">
            <div class="row py-2">
              <div class="col-sm-3 col-6 text-center">
                <button type="button" class="btn sort-btn" data-sort="price_asc">Od najlacnejšieho</button>
              </div>
              <div class="col-sm-3 col-6 text-center">
                <button type="button" class="btn sort-btn" data-sort="price_desc">Od najdrahšieho</button>
              </div>
              <div class="col-sm-3 col-6 text-center">
                <button type="button" class="btn" data-sort="newest">Najnovšie</button>
              </div>
              <div class="col-sm-3 col-6 text-center">
                <button type="button" class="btn" data-sort="discount">Výška zľavy</button>
              </div>
              <input type="hidden" id="sort-select" name="sort" value="{{ $sort ?? '' }}">
            </div>
        </div>
          <div class="row">

            @foreach($products as $product)
            <div class="col-sm-6 col-md-6 col-lg-3 product-col">
                <x-product-card-new :product="$product" :name="$product->name" :price="$product->price"  
                :image="isset($product->images[0]) ? $product->images[0]->image_name : 'default.jpg'"></x-product-card>
            </div>
            @endforeach
            
          </div>
            <div class="pagination justify-content-center">
                {{ $products->links() }}
            </div>
        

        </div>
      </div>
    </div>
  </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {

    $('.category-button').on('click', function() {

        var category = $(this).data('category');

        var actionUrl = '/search?categoryID=' + encodeURIComponent(category);

        window.location.href = actionUrl;
    });

    $('.sort-btn').on('click', function() {
        var sort = $(this).data('sort');

        $('#sort-select').val(sort);

        $('#filter-form').submit();
    });
});


</script>




@endsection

    