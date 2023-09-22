<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Rules\YooNumber;

class YoomoneyForm extends PaymentForm
{
    public string $yooNumber = '';

    public function render()
    {
        return view('livewire.yoomoney-form');
    }

    protected function rules(): array
    {
        return [
            'yooNumber' => [
                'required',
                new YooNumber
            ],
        ];
    }

    protected function messages(): array
    {
        return [
            'yooNumber.required' => 'Enter the account number',
        ];
    }

}
