<nav class="nav navbar-fluid main-navbar-2">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4 col-6 order-1 order-md-1">
                <div class="row">
                    <div class="col-lg-4 brand-icon">
                        <a href="/"><img src="{{asset('resources/icons/icons8-mobile-order-100.png')}}"
                                         alt="logo spolocnosti MobileTech"></a>
                    </div>
                    <div class="col-lg-7 brand-name d-none d-lg-flex" id="cname">
                        <a href="/">MobileTech</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 order-3 order-md-2 pb-4">
                <div class="input-group p-4">
                    <input type="text" class="form-control search-bar" placeholder="Vyhľadávanie" aria-label="Vyhľadávanie"
                           id="main_search_bar">
                    <button class="btn btn-outline-secondary" type="button" id="search-bar-icon-btn">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>

            <div class="col-md-4 col-6 order-2 order-md-3" id="col-shopping-cart">
                <button class="btn cart-btn">

            <span id="shopping-cart-span justify-content-center"><img src="{{asset('resources/icons/shopping_cart.svg')}}"
                                                                      alt="nakupny kosik" class="mr-2">12.00€</span>
                </button>
            </div>
        </div>
    </div>
</nav>
</nav>
