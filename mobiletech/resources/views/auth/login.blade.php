{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.layout')

@section('content')
<main class="container-fluid">
    <div class="row py-5">
      <div class="container justify-content-center">
        <h1 class="orange-text-color">Prihlásenie</h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-8 col-lg-6 col-xl-4">
      <form method="POST" action="{{ route('login') }}">
      @csrf  <!-- CSRF Token for form submission validation -->
          <div class="mb-3">
            <label for="email" class="form-label"><i class="bi bi-envelope-at-fill orange-text-color mr-2"
                style="font-size: 1.5rem;"></i> Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label"><i class="bi bi-lock-fill orange-text-color mr-2"
                style="font-size: 1.5rem;"></i> Heslo:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          </div>
          <div class="container justify-content-center mt-5">
            <button type="submit" class="btn orange-btn px-5">Prihlásiť sa</button>
          </div>
        </form>
        <div class="container my-5 justify-content-center">
        <a href="{{ route('register') }}" class="btn orange-btn px-5">Registrácia</a>
      </div>
      </div>
    </div>
  </main>
@endsection