<button class="btn cart-btn">
    <span id="shopping-cart-span justify-content-center">
        <img src="{{asset('resources/icons/shopping_cart.svg')}}" alt="nakupny kosik" class="mr-2">
        {{App\Services\ShoppingCart::calculateTotalSum()}}€
    </span>
</button>
