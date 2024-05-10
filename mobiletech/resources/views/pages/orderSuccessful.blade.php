@extends('layouts.orderSuccessfullLayout')

@section('content')


    <a href="/" class="no-glow-anchor justify-content-center" >
        <article id="center-successful-img-text">
            <img src="{{asset('resources/icons/check_circle_icon.svg')}}" alt="objednavka uspesna" id="successful-img">
            <p>Vaša objednávka bola úspešne prijatá</p>
        </article>
    </a>


@endsection
