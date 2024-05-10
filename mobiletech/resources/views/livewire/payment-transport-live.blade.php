<section class="row mt-1 back-ground-white pb-4 pr-4 pl-4" id="shopping-cart-body">
    <h3 class="personal-data-title ">Spôsob dopravy a platby</h3>
    <section class="row container-fluid">
        <section class="col-sm-6">
            <h3 class="personal-data-title p-0">Doprava</h3>
            <span id="kurier" wire:click="submitTransportMethod(0)"  class="{{ $transportMethodsClickStatus[0] ? 'delivery-payment-span-clicked':'delivery-payment-span' }}"><img src="resources/icons/delivery-van.svg"
                                                              alt="ikonka email"><span class="delivery-payment-name">Kuriér na adresu (+4,99€)</span></span>

            <span id="osobny_odber" wire:click="submitTransportMethod(1)"   class="{{ $transportMethodsClickStatus[1] ? 'delivery-payment-span-clicked':'delivery-payment-span' }}"><img src="resources/icons/shop-window.svg"
                                                                    alt="ikonka email"><span
                    class="delivery-payment-name">Osobný odber</span></span>
        </section>
        <section class="col-sm-6">
            <h3 class="personal-data-title p-0">Platba</h3>
            <span id="karta" wire:click="submitPaymentMethod(0)" class="{{ $paymentMethodsClickStatus[0] ? 'delivery-payment-span-clicked':'delivery-payment-span' }}"><img src="resources/icons/credit-card.svg"
                                                             alt="ikonka telefon"><span class="delivery-payment-name">Karta</span></span>

            <span  id="dobierka" wire:click="submitPaymentMethod(1)" class="{{ $paymentMethodsClickStatus[1] ? 'delivery-payment-span-clicked':'delivery-payment-span' }}"><img src="resources/icons/cash.svg" alt="ikonka telefon"><span
                    class="delivery-payment-name">Dobierka (+2,99€)</span></span>


            <span id="bankovy_prevod" wire:click="submitPaymentMethod(2)" class="{{ $paymentMethodsClickStatus[2] ? 'delivery-payment-span-clicked':'delivery-payment-span' }}"><img src="resources/icons/bank.svg" alt="ikonka telefon"><span
                    class="delivery-payment-name">Bankový prevod</span></span>


        </section>


    </section>

    <section class="row container-fluid mt-4">
        <section class="col-12 d-flex justify-content-center">
            <a href="/order-finalization" class="no-glow-anchor btn next-buying-stage-button">Prejsť na dokončenie objednávky</a>
        </section>

    </section>
</section>
