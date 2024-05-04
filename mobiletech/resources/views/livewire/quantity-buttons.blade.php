
<div class="row">
    <div class="col-12 col-sm-6 justify-content-center">

        <div class="input-group quantity-input-group">
            <button class="btn btn-outline-secondary" type="button" id="sub-btn" wire:click="sub">-</button>

            <input type="text" id="quantity" class="form-control text-center" wire:model="quantity"
                   aria-label="Quantity" min="1">
            <span class="input-group-text">ks</span>

            <button class="btn btn-outline-secondary" type="button" id="add-btn" wire:click="add">+</button>
        </div>

    </div>

    <div class="col-12 col-sm-6 py-sm-0 py-3 justify-content-center">
        <button class="btn cart-btn cart-btn-fixed-width" wire:click="submit">
            <img src="{{asset('resources/icons/shopping_cart.svg')}}" alt="nakupny kosik">
            Vložiť do košíka
        </button>
    </div>
</div>
