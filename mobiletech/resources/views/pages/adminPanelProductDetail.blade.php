{{-- resources/views/pages/adminPanelProductDetail.blade.php --}}
@extends('layouts.adminPanelLayout')


@section('content')

    <main>
            <div class="container-fluid back-ground-color">
                <div class="container-md bg-white px-5">
                    <div class="container-fluid py-3 pl-4">
                        <h1>Samsung Galaxy S10
                        </h1>
                    </div>

                    <div class="row justify-content-center py-5">
                        <div class="col-12 col-md-8 col-lg-4 w-25">
                            <div class="container">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="resources\phones\phone_2.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="resources\phones\phone_default.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="resources\phones\phone_2.png" class="d-block w-100" alt="...">
                                        </div>
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
                            <p>
                                Galaxy S10 ponúka svojim používateľom najnovšie mobilné technológie. Uchvátia vás
                                fotoaparáty so 4 objektívmi, AMOLED displej novej generácie aj to, aký je telefón
                                inteligentný
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Cena</div>
                        <div class="col-6 col-md-5 col-lg-4">256€</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Počet kusov na sklade</div>
                        <div class="col-6 col-md-5 col-lg-4">10</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Značka</div>
                        <div class="col-6 col-md-5 col-lg-4">Samsung</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Séria</div>
                        <div class="col-6 col-md-5 col-lg-4">Galaxy S</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Model</div>
                        <div class="col-6 col-md-5 col-lg-4">S 10</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Farba</div>
                        <div class="col-6 col-md-5 col-lg-4">Čierna</div>
                    </div>
                    <div class="container-fluid">
                        <h2>Hardvér a softvér</h2>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">CPU</div>
                        <div class="col-6 col-md-5 col-lg-4">2 x 2,7 GHz + 2 x 2,3 GHz + 4 x 1,9 GHz</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Počet jadier procesora</div>
                        <div class="col-6 col-md-5 col-lg-4">8</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Operačný systém</div>
                        <div class="col-6 col-md-5 col-lg-4">Android</div>
                    </div>
                    <div class="container-fluid">
                        <h2 class="pl-3">Displej</h2>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Veľkosť displeja</div>
                        <div class="col-6 col-md-5 col-lg-4">6,1"</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Rozlíšenie displeja</div>
                        <div class="col-6 col-md-5 col-lg-4">1440x3040</div>
                    </div>
                    <div class="container-fluid">
                        <h2 class="pl-3">Pamäť</h2>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Operačná pamäť</div>
                        <div class="col-6 col-md-5 col-lg-4">8GB</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Interná pamäť</div>
                        <div class="col-6 col-md-5 col-lg-4">128GB</div>
                    </div>
                    <div class="container-fluid">
                        <h2 class="pl-3">Batéria</h2>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Typ batérie</div>
                        <div class="col-6 col-md-5 col-lg-4">Li-Ion</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Kapacita batérie</div>
                        <div class="col-6 col-md-5 col-lg-4">3400mAh</div>
                    </div>
                    <div class="container-fluid">
                        <h2 class="pl-3">Rozmery a hmotnosť</h2>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Výška</div>
                        <div class="col-6 col-md-5 col-lg-4">149,9mm</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Šírka</div>
                        <div class="col-6 col-md-5 col-lg-4">70,4mm</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Hrúbka</div>
                        <div class="col-6 col-md-5 col-lg-4">7,8mm</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Hmotnosť</div>
                        <div class="col-6 col-md-5 col-lg-4">157g</div>
                    </div>
                    <div class="container-fluid">
                        <h2 class="pl-3">Fotoaparát</h2>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Rozlíšenie predného fotoaparátu</div>
                        <div class="col-6 col-md-5 col-lg-4">10Mpx</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Rozlíšenie zadného fotoaparátu</div>
                        <div class="col-6 col-md-5 col-lg-4">16Mpx</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Počet zadných objektívov</div>
                        <div class="col-6 col-md-5 col-lg-4">3</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Počet predných objektívov</div>
                        <div class="col-6 col-md-5 col-lg-4">1</div>
                    </div>
                    <div class="container-fluid">
                        <h2 class="pl-3">Funkcie</h2>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">Audio jack</div>
                        <div class="col-6 col-md-5 col-lg-4">Áno</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">NFC</div>
                        <div class="col-6 col-md-5 col-lg-4">Áno</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-5 col-lg-4 pl-5">single/dualSim</div>
                        <div class="col-6 col-md-5 col-lg-4 pb-5">Dual SIM</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4 justify-content-center">
                            <button class="btn my-5 px-5 cart-btn">Späť</button>
                        </div>

                    </div>
                </div>
            </div>
        </main>
@endsection