<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Exceptions\CreatePaymentException;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardExpirationDate;
use LVR\CreditCard\CardNumber;
use Throwable;

class CardForm extends PaymentForm
{
    public string $card = '';
    public string $exp = '';
    public string $cvc = '';

    public string $phoneReq = '';
    public bool $needPhone = false;

    public function submit()
    {
        $this->validate();

        if ($this->hasPhoneService()) {
            $this->needPhone = true;
            return true;
        }

        try {
            $this->createPayment();
            return redirect()->route('page.status');
        } catch (CreatePaymentException $e) {
            $this->addError('general', 'Error while creating payment');
        } catch (Throwable $th) {
            $this->addError('general', 'Something went wrong');
        }
    }

    public function render()
    {
        return view('livewire.card-form');
    }

    protected function rules(): array
    {
        return [
            'card' => ['required', new CardNumber],
            'exp' => ['required', new CardExpirationDate('m/y')],
            'cvc' => ['required', 'size:3', new CardCvc($this->card)],
            'phoneReq' => [
                'sometimes',
                'regex:/^\+\d{1,2}\(\d{3}\)\d{3}-\d{2}-\d{2}$/',
            ],
        ];
    }

    protected function messages(): array
    {
        return [
            'card.required' => 'Enter the card number',
            'exp.required' => 'Enter the card expiration date',
            'cvc.required' => 'Enter the CVC code',
            'cvc.size' => 'CVC code must be of 3 digits',
            'phoneReq.regex' => 'Phone number format is invalid',
        ];
    }

    private function hasPhoneService(): bool
    {
        return $this->phoneReq === '';
    }

}
