@extends('layouts.buyingLayout')

@section('current_stage')
@include('partials.payment-transport-stage')
@endsection

@section('content')

@livewire('payment-transport-live')
@endsection
