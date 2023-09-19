@extends('layouts.app')

@section('content')
    <div class="flex justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        @livewire('payment-form', [
            'amount' => $amount,
            'currencyCode' => $currencyCode,
        ])
    </div>
@endsection
