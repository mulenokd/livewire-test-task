@extends('layouts.app')

@section('content')
    <div class="flex justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8 h-auto"
         x-data="{ form: 'BANK_CARD'}">

        <x-payment.methods/>

        <x-payment.wrap :type="'BANK_CARD'">
            @livewire('card-form', $paymentData)
        </x-payment.wrap>

        <x-payment.wrap :type="'QIWI'">
            @livewire('qiwi-form', $paymentData)
        </x-payment.wrap>

        <x-payment.wrap :type="'YOOMONEY'">
            @livewire('yoomoney-form', $paymentData)
        </x-payment.wrap>

    </div>
@endsection
