<section class="card" id="shopping-cart-order-sum">
    <section class="card-body back-ground-color">
        <h3 class="text-align-center">Súčet objednávky</h3>
        <p>Celková suma bez DPH:</p>
        <p>{{$totalSum*0.8}}€</p>
        <p>DPH:</p>
        <p>{{$totalSum*0.2}}€</p>
        <p>Celková suma:</p>
        <p>{{$totalSum}}€</p>
        <div class="justify-content-center pt-2">
            <a href="/customer-information" class="no-glow-anchor"><button class="btn" id="go-pay">Prejsť do pokladne</button></a>
        </div>
    </section>
</section>
