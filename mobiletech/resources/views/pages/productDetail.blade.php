@extends('layouts.layout')

@section('content')
    <div class="container-fluid back-ground-color">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="container my-5 justify-content-center">
                    <x-image-carousel :images="$product_images">

                    </x-image-carousel>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="container my-5">
                    <ul class="list-no-bullets">
                        <li>
                            <div class="container">
                                <h1>{{$product->first()->name}}</h1>
                            </div>
                        </li>
                        <li>
                            <div class="container my-5 py-3 px-3 bg-white rounded-4">
                                <div class="container back-ground-color rounded-4 px-4 py-3">
                                    <h1 class="pb-2">Popis produktu</h1>
                                    <p>Smartfón Samsung Galaxy M52 5G sa vyznačuje krásnym dizajnom, pohodlným držaním,
                                        výborným výkonom
                                        a skvelou výdržou.</p>
                                    <h1 class="py-2">Parametre</h1>
                                    <div class="row">
                                        <div class="col-6">Značka</div>
                                        <div class="col-6">Samsung</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">Séria</div>
                                        <div class="col-6">Galaxy S</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">Model</div>
                                        <div class="col-6">S10</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">Farba</div>
                                        <div class="col-6">Čierna</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">Typ konštrukcie</div>
                                        <div class="col-6">Dotykové</div>
                                    </div>
                                    <button class="btn btn-link p-0 text-decoration-none" type="button"
                                            data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasParameters" aria-controls="offcanvasParameters">
                                        Zobraziť všetky parametre
                                    </button>
                                    <div class="text-end px-3">
                                        <h1>786.99€</h1>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-12 col-sm-6 justify-content-center">
                                    <div class="input-group quantity-input-group">
                                        <button class="btn btn-outline-secondary" type="button">-</button>
                                        <input type="text" id="quantity" class="form-control text-center" value="1"
                                               aria-label="Quantity">
                                        <span class="input-group-text">ks</span>
                                        <button class="btn btn-outline-secondary" type="button">+</button>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-6 py-sm-0 py-3 justify-content-center">
                                    <button class="btn cart-btn cart-btn-fixed-width">
                                        <img src="{{asset('resources/icons/shopping_cart.svg')}}" alt="nakupny kosik">
                                        Vložiť do košíka
                                    </button>
                                </div>
                            </div>
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
        <div class="offcanvas-header">
            <h3 id="offcanvasParametersLabel">Všetky parametre</h3>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="col-6">Značka</div>
                <div class="col-6">Samsung</div>
            </div>
            <div class="row">
                <div class="col-6">Séria</div>
                <div class="col-6">Galaxy S</div>
            </div>
            <div class="row">
                <div class="col-6">Model</div>
                <div class="col-6">S10</div>
            </div>
            <div class="row">
                <div class="col-6">Farba</div>
                <div class="col-6">Čierna</div>
            </div>
            <div class="row">
                <div class="col-6">Typ konštrukcie</div>
                <div class="col-6">Dotykové</div>
            </div>
            <div class="row">
                <h4>Hardvér a softvér</h4>
            </div>
            <div class="row">
                <div class="col-6">CPU</div>
                <div class="col-6">2 x 2,7 GHz + 2 x 2,3 GHz + 4 x 1,9 GHz</div>
            </div>
            <div class="row">
                <div class="col-6">Počet jadier procesora</div>
                <div class="col-6">8</div>
            </div>
            <div class="row">
                <div class="col-6">GPU</div>
                <div class="col-6">Mali-G76 MP12</div>
            </div>
            <div class="row">
                <div class="col-6">Operačný systém</div>
                <div class="col-6">Android</div>
            </div>
            <div class="row">
                <h4>Displej</h4>
            </div>
            <div class="row">
                <div class="col-6">Veľkosť displeja</div>
                <div class="col-6">6.1"</div>
            </div>
            <div class="row">
                <div class="col-6">Rozlíšenie displeja</div>
                <div class="col-6">1440x3040</div>
            </div>
            <div class="row">
                <div class="col-6">Typ displeja</div>
                <div class="col-6">Dynamic AMOLED</div>
            </div>
            <div class="row">
                <h4>Pamäť</h4>
            </div>
            <div class="row">
                <div class="col-6">Operačná pamäť</div>
                <div class="col-6">8 GB</div>
            </div>
            <div class="row">
                <div class="col-6">Interná pamäť</div>
                <div class="col-6">128 GB</div>
            </div>
            <div class="row">
                <h4>Batéria</h4>
            </div>
            <div class="row">
                <div class="col-6">Typ batérie</div>
                <div class="col-6">Li-Ion</div>
            </div>
            <div class="row">
                <div class="col-6">Kapacita batérie</div>
                <div class="col-6">3400 mAh</div>
            </div>
            <div class="row">
                <h4>Rozmery a hmotnosť</h4>
            </div>
            <div class="row">
                <div class="col-6">Výška</div>
                <div class="col-6">149,9mm</div>
            </div>
            <div class="row">
                <div class="col-6">Šírka</div>
                <div class="col-6">70,4mm</div>
            </div>
            <div class="row">
                <div class="col-6">Hrúbka</div>
                <div class="col-6">7,8mm</div>
            </div>
            <div class="row">
                <div class="col-6">Hmotnosť</div>
                <div class="col-6">157g</div>
            </div>
            <div class="row">
                <h4>Fotoaparát</h4>
            </div>
            <div class="row">
                <div class="col-6">Video</div>
                <div class="col-6">2160p 4K, 1080p FulHD</div>
            </div>
            <div class="row">
                <div class="col-6">Rozlíšenie predného fotoaparátu</div>
                <div class="col-6">10Mpx</div>
            </div>
            <div class="row">
                <div class="col-6">Rozlíšenie zadného fotoaparátu</div>
                <div class="col-6">16Mpx</div>
            </div>
            <div class="row">
                <div class="col-6">Počet zadných objektívov</div>
                <div class="col-6">3</div>
            </div>
            <div class="row">
                <div class="col-6">Počet predných objektívov</div>
                <div class="col-6">1</div>
            </div>
            <div class="row">
                <h4>Funkcie</h4>
            </div>
            <div class="row">
                <div class="col-6">Audio jack</div>
                <div class="col-6">Áno</div>
            </div>
            <div class="row">
                <div class="col-6">Bluetooth</div>
                <div class="col-6">Bluetooth 5.0</div>
            </div>
            <div class="row">
                <div class="col-6">NFC</div>
                <div class="col-6">Áno</div>
            </div>
            <div class="row">
                <div class="col-6">single/dualSim</div>
                <div class="col-6">Dual SIM</div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

@endsection
