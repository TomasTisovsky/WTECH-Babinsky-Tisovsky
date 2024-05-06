<button class="btn add-to-cart-btn" wire:click="addToCart">
    <input type="hidden" wire:model="product_id">
    <input type="hidden" wire:model="image">
    <input type="hidden" wire:model="quantity">
    <input type="hidden" wire:model="price">
    <span>
        <img src="{{asset('resources/icons/shopping_cart_plus.svg')}}" alt="nakupny kosik" class="shopping-card-plus">
    </span>
</button>

