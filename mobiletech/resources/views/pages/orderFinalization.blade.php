@extends('layouts.buyingLayout')

@section('current_stage')
@include('partials.order-finalization-stage')
@endsection

@section('content')

    <section class="row mt-1 back-ground-white pb-4 pr-4 pl-4" id="shopping-cart-body">
        <h3 class="personal-data-title ">Vaše kontaktné údaje</h3>
        <section class="row container-fluid">
            <section class="col-lg-6">
            <span class="personal-data-span "><img src="resources/icons/envelope_email_icon_yellow.svg"
                                                   alt="ikonka email"><span class="pl-2">Email: jozko.mrkvicka@gmail.com</span></span>
            </section>
            <section class="col-lg-6">
            <span class="personal-data-span"><img src="resources/icons/phone_icon_yellow.svg" alt="ikonka telefon"><span
                    class="pl-2">Telefón: 0944 444 444</span></span>
            </section>
            <section class="col-lg-6">
            <span class=" personal-data-span "><img src=" resources/icons/profile_account_user_avatar_icon_yellow.svg"
                                                    alt="ikonka meno">
              <span class="pl-2">Meno: Jozef</span></span>
            </section>
            <section class="col-lg-6">
            <span class="personal-data-span"><img src="resources/icons/profile_account_user_avatar_icon_yellow.svg"
                                                  alt="ikonka priezvisko"><span class="pl-2">Priezvisko: Mrkvička</span></span>
            </section>


        </section>
        <h3 class="personal-data-title">Vaše doručovacie údaje</h3>
        <section class="row container-fluid">
            <section class="col-lg-6">
            <span class="personal-data-span "><img src="resources/icons/house.svg" alt="ikonka ulica"><span
                    class="pl-2">Ulica a čislo domu: Dolná</span></span>

            </section>
            <section class="col-lg-6">
            <span class="personal-data-span"><img src="resources/icons/location.svg" alt="ikonka mesto"><span
                    class="pl-2">Mesto: Kocúrkovo</span></span>

            </section>
            <section class="col-lg-6">
            <span class=" personal-data-span "><img src=" resources/icons/envelope-check-fill.svg" alt="ikonka psč">
              <span class="pl-2">PSČ: 007 12</span></span>
            </section>
            <section class="col-lg-6">
            <span class="personal-data-span"><img src="resources/icons/map.svg" alt="ikonka krajina"><span
                    class="pl-2">Krajina: Slovensko</span></span>
            </section>
        </section>


        <section class="row container-fluid next-buying-stage-button-row">
            <section class="col-12 d-flex justify-content-center">
                <button class="btn next-buying-stage-button ">Dokončiť objednávku</button>
            </section>

        </section>


    </section>

@endsection
