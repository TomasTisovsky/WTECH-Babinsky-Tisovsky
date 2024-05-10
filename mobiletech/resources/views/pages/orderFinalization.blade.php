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
                                                   alt="ikonka email"><span class="pl-2">Email: {{$order_details['email']}}</span></span>
            </section>
            <section class="col-lg-6">
            <span class="personal-data-span"><img src="resources/icons/phone_icon_yellow.svg" alt="ikonka telefon"><span
                    class="pl-2">Telefón: {{$order_details['phone_number']}}</span></span>
            </section>
            <section class="col-lg-6">
            <span class=" personal-data-span "><img src=" resources/icons/profile_account_user_avatar_icon_yellow.svg"
                                                    alt="ikonka meno">
              <span class="pl-2">Meno: {{$order_details['name']}}</span></span>
            </section>
            <section class="col-lg-6">
            <span class="personal-data-span"><img src="resources/icons/profile_account_user_avatar_icon_yellow.svg"
                                                  alt="ikonka priezvisko"><span class="pl-2">Priezvisko: {{$order_details['surname']}}</span></span>
            </section>


        </section>
        <h3 class="personal-data-title">Vaše doručovacie údaje</h3>
        <section class="row container-fluid">
            <section class="col-lg-6">
            <span class="personal-data-span "><img src="resources/icons/house.svg" alt="ikonka ulica"><span
                    class="pl-2">Ulica a čislo domu: {{$order_details['street']}}</span></span>

            </section>
            <section class="col-lg-6">
            <span class="personal-data-span"><img src="resources/icons/location.svg" alt="ikonka mesto"><span
                    class="pl-2">Mesto: {{$order_details['city']}}</span></span>

            </section>
            <section class="col-lg-6">
            <span class=" personal-data-span "><img src=" resources/icons/envelope-check-fill.svg" alt="ikonka psč">
              <span class="pl-2">PSČ: {{$order_details['postal_code']}}</span></span>
            </section>
            <section class="col-lg-6">
            <span class="personal-data-span"><img src="resources/icons/map.svg" alt="ikonka krajina"><span
                    class="pl-2">Krajina: {{$order_details['country']}}</span></span>
            </section>
        </section>


        <section class="row container-fluid next-buying-stage-button-row">
            <section class="col-12 d-flex justify-content-center">
                <form  method="POST" action="/order-finalization" id="finalization-form">
                    @csrf
                    <button type="submit" class="btn next-buying-stage-button">Dokončiť objednávku</button>
                </form>

            </section>

        </section>


    </section>

@endsection
