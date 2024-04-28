<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="stylesheet.css" />
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <title>MobileTech</title>
    <link rel="icon" href="resources/icons/logo.png">
</head>

<body>
<!--Prvy navbar-->
@include('partials.navbar-top')
<!--Druhy navbar-->
@include('partials.navbar-main-sb')

<main class="container-fluid h-100 back-ground-color">
    <div class="row ">
        <div class="col-md-4">
            <aside class="flex">
                <div class="btn-group-vertical aside-buttons">
                    <button type="button" class="btn"><span><img src="{{asset('resources/icons/smartphones_icon.svg')}}"
                                                                 alt="Mobilné telefóny ikonka" class="img-fluid"><span>Mobilné telefóny</span></span></button>
                    <button type="button" class="btn"><span><img src="{{asset('resources/icons/tablets_icon.svg')}}" alt="Tablety ikonka"
                                                                 class="img-fluid"><span>Tablety</span></span></button>
                    <button type="button" class="btn"><span><img src="{{asset('resources/icons/protective_glass_icon.svg')}}"
                                                                 alt="Sklá a fólie ikonka" class="img-fluid"><span>Sklá a fólie</span></span></button>
                    <button type="button" class="btn"><span><img src="{{asset('resources/icons/accesories_icon.svg')}}" alt="Tablety ikonka"
                                                                 class="img-fluid"><span>Príslušenstvo</span></span></button>
                    <button type="button" class="btn"><span><img src="{{asset('resources/icons/tablets_icon.svg')}}" alt="Tablety ikonka"
                                                                 class="img-fluid"><span>Kryty a obaly</span></span></button>
                </div>
            </aside>

        </div>
        <div class="col-md-8 flex">
            <h2 class="default-title mt-3">Top produkty</h2>
            <div class="row md-6 mt-3">
                <div class="col-sm-6 col-md-6 col-lg-4 product-col">
                    <div class="card product-card ">
                        <div class="card-body  product-card-main-page modified-card-body">
                            <p class="card-text card-product-name">
                                iPhone 15 pro</p>
                            <img class="img-fluid card-main-image card-image-top p-0" src="resources/phones/phone_default.png"
                                 alt="mobil fotografia">

                            <div class="row container-fluid p-0">
                                <div class="col-6 d-flex card-button-col">
                                    <button class="btn add-to-cart-btn">
                      <span><img src="resources/icons/shopping_cart_plus.svg" alt="nakupny kosik"
                                 class="shopping-card-plus"></span>
                                    </button>
                                </div>
                                <div class="col-6 d-flex price-button-col ">
                                    <p class="price-tag">999.99€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 product-col">
                    <div class="card product-card ">
                        <div class="card-body  product-card-main-page modified-card-body">
                            <p class="card-text card-product-name">
                                iPhone 15</p>
                            <img class="img-fluid card-main-image card-image-top p-0" src="resources/phones/phone_2.png"
                                 alt="mobil fotografia">

                            <div class="row container-fluid p-0">
                                <div class="col-6 d-flex card-button-col">
                                    <button class="btn add-to-cart-btn">
                      <span><img src="resources/icons/shopping_cart_plus.svg" alt="nakupny kosik"
                                 class="shopping-card-plus"></span>
                                    </button>
                                </div>
                                <div class="col-6 d-flex price-button-col ">
                                    <p class="price-tag">874.99€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 product-col">
                    <div class="card product-card ">
                        <div class="card-body  product-card-main-page modified-card-body">
                            <p class="card-text card-product-name">
                                Redmi note 8</p>
                            <img class="img-fluid card-main-image card-image-top p-0" src="resources/phones/phone_2.png"
                                 alt="mobil fotografia">

                            <div class="row container-fluid p-0">
                                <div class="col-6 d-flex card-button-col">
                                    <button class="btn add-to-cart-btn">
                      <span><img src="resources/icons/shopping_cart_plus.svg" alt="nakupny kosik"
                                 class="shopping-card-plus"></span>
                                    </button>
                                </div>
                                <div class="col-6 d-flex price-button-col ">
                                    <p class="price-tag">255.99€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <h2 class="default-title mt-3">Zľavňené produkty</h2>
            <div class="row md-6 mt-3">
                <div class="col-sm-6 col-md-6 col-lg-4 product-col">
                    <div class="card product-card ">
                        <div class="card-body  product-card-main-page modified-card-body">
                            <p class="card-text card-product-name">
                                iPhone SE</p>
                            <img class="img-fluid card-main-image card-image-top p-0" src="resources/phones/phone_2.png"
                                 alt="mobil fotografia">

                            <div class="row container-fluid p-0">
                                <div class="col-6 d-flex card-button-col">
                                    <button class="btn add-to-cart-btn">
                      <span><img src="resources/icons/shopping_cart_plus.svg" alt="nakupny kosik"
                                 class="shopping-card-plus"></span>
                                    </button>
                                </div>
                                <div class="col-6 d-flex price-button-col ">
                                    <p class="price-tag">800€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 product-col">
                    <div class="card product-card ">
                        <div class="card-body  product-card-main-page modified-card-body">
                            <p class="card-text card-product-name">
                                iPhone 14 pro</p>
                            <img class="img-fluid card-main-image card-image-top p-0" src="resources/phones/phone_default.png"
                                 alt="mobil fotografia">

                            <div class="row container-fluid p-0">
                                <div class="col-6 d-flex card-button-col">
                                    <button class="btn add-to-cart-btn">
                      <span><img src="resources/icons/shopping_cart_plus.svg" alt="nakupny kosik"
                                 class="shopping-card-plus"></span>
                                    </button>
                                </div>
                                <div class="col-6 d-flex price-button-col ">
                                    <p class="price-tag">799.99€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 product-col">
                    <div class="card product-card ">
                        <div class="card-body  product-card-main-page modified-card-body">
                            <p class="card-text card-product-name">
                                iPhone 14</p>
                            <img class="img-fluid card-main-image card-image-top p-0" src="resources/phones/phone_default.png"
                                 alt="mobil fotografia">

                            <div class="row container-fluid p-0">
                                <div class="col-6 d-flex card-button-col">
                                    <button class="btn add-to-cart-btn">
                      <span><img src="resources/icons/shopping_cart_plus.svg" alt="nakupny kosik"
                                 class="shopping-card-plus"></span>
                                    </button>
                                </div>
                                <div class="col-6 d-flex price-button-col ">
                                    <p class="price-tag">675.34€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</main>



</body>
@include('partials.footer')

</html>
