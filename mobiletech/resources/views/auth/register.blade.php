{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.layout')


@section('content')
<main class="container-fluid">
    <div class="row py-5">
        <div class="container justify-content-center">
            <h1 class="orange-text-color">Registrácia</h1>
        </div>
    </div>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="row justify-content-center">

            <section class="col-sm-6">
                <section class="mb-3">
                    <label for="name" class="form-label">
                        <img src="resources/icons/profile_account_user_avatar_icon_yellow.svg" alt="ikonka meno">
                        Meno:
                    </label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </section>
                <section class="mb-3">
                    <label for="email" class="form-label">
                        <img src="resources/icons/envelope_email_icon_yellow.svg" alt="ikonka email">
                        Email:
                    </label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </section>
                <section class="mb-3">
                    <label for="password" class="form-label">
                        <img src="resources/icons/passwd.svg" alt="ikonka heslo">
                        Heslo:
                    </label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </section>
            </section>

            <section class="col-sm-6">
                <section class="mb-3">
                    <label for="surname" class="form-label">
                        <img src="resources/icons/profile_account_user_avatar_icon_yellow.svg" alt="ikonka meno">
                        Priezvisko:
                    </label>
                    <input type="text" class="form-control" id="surname" name="surname" required>
                </section>
                <section class="mb-3">
                    <label for="phone_number class="form-label">
                        <img src="resources/icons/phone_icon_yellow.svg" alt="ikonka email">
                        Telefón (nepovinné):
                    </label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number">
                </section>
            </section>

            <article class="container my-5 justify-content-center">
                    <button type="submit" class="btn orange-btn px-5">
                        Registrujte sa
                    </button>
                </article>
        </div>
    </form>
</main>
@endsection
