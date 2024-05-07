@extends('layouts.buyingLayout')

@section('current_stage')
    @include('partials.contact-information-stage')
@endsection

@section('content')

    <section class="row mt-1 back-ground-white" id="shopping-cart-body">
        <h3 class="personal-data-title ">Vaše kontaktné údaje</h3>
        <form>
            <section class="row container-fluid">
                <section class="col-sm-6">
                        <span class="personal-data-span "><img src="resources/icons/envelope_email_icon_yellow.svg"
                                                               alt="ikonka email"><span
                                class="pl-2">Email:*</span></span>

                    <input type="text" name="Email input" placeholder="Sem zadajte váš email"
                           class="personal-data-input">
                </section>
                <section class="col-sm-6">
                        <span class="personal-data-span"><img src="resources/icons/phone_icon_yellow.svg"
                                                              alt="ikonka telefon"><span
                                class="pl-2">Telefón:*</span></span>

                    <input type="text" name="Phone input" placeholder="+421" class="personal-data-input">
                </section>
                <section class="col-sm-6">
                        <span class=" personal-data-span "><img
                                src=" resources/icons/profile_account_user_avatar_icon_yellow.svg" alt="ikonka meno">
                            <span class="pl-2">Meno:*</span></span>

                    <input type="text" name="Name input" placeholder="Sem zadajte vaše meno"
                           class="personal-data-input">
                </section>
                <section class="col-sm-6">
                        <span class="personal-data-span"><img
                                src="resources/icons/profile_account_user_avatar_icon_yellow.svg"
                                alt="ikonka priezvisko"><span class="pl-2">Priezvisko:*</span></span>

                    <input type="text" name="Phone input" placeholder="Sem zadajte vaše priezvisko"
                           class="personal-data-input">
                </section>


            </section>
            <h3 class="personal-data-title">Vaše doručovacie údaje</h3>
            <section class="row container-fluid">

                <section class="col-sm-6">
                        <span class="personal-data-span "><img src="resources/icons/house.svg" alt="ikonka ulica"><span
                                class="pl-2">Ulica a čislo domu:*</span></span>

                    <input type="text" name="Street input" placeholder="Sem zadajte vašu ulicu"
                           class="personal-data-input">
                </section>
                <section class="col-sm-6">
                        <span class="personal-data-span"><img src="resources/icons/location.svg"
                                                              alt="ikonka mesto"><span
                                class="pl-2">Mesto:*</span></span>

                    <input type="text" name="City input" placeholder="Sem zadajte vaše mesto"
                           class="personal-data-input">
                </section>
                <section class="col-sm-6">
                        <span class=" personal-data-span "><img src=" resources/icons/envelope-check-fill.svg"
                                                                alt="ikonka psč">
                            <span class="pl-2">PSČ:*</span></span>

                    <input type="text" name="Postal code input" placeholder="Sem zadajte vaše PSČ"
                           class="personal-data-input">
                </section>
                <section class="col-sm-6">
                        <span class="personal-data-span"><img src="resources/icons/map.svg" alt="ikonka krajina"><span
                                class="pl-2">Krajina:*</span></span>

                    <input type="text" name="Country input" placeholder="Sem zadajte vašu krajinu"
                           class="personal-data-input">
                </section>
            </section>

            <section class="row container-fluid mt-4">
                <span class="personal-data-span pl-4 mb-1">Poznámka:</span>
                <section class="col-12  d-flex justify-content-center">

                    <textarea name="note" id="note" cols="30" rows="10"></textarea>
                </section>

            </section>
        </form>
        <section class="row container-fluid mt-4">
            <section class="col-12 d-flex justify-content-center">
                <button class="btn next-buying-stage-button ">Pokračovať na výber dopravy a platby</button>
            </section>

        </section>

    </section>

@endsection
