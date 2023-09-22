<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Exceptions\CreatePaymentException;
use Throwable;

class QiwiForm extends PaymentForm
{
    public string $phone = '';

    public string $email = '';
    public bool $needEmail = false;

    public function submit()
    {
        $this->validate();

        if ($this->hasEmailService()) {
            $this->needEmail = true;
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
        return view('livewire.qiwi-form');
    }

    protected function rules(): array
    {
        return [
            'phone' => [
                'required',
                'regex:/^\+\d{1,2}\(\d{3}\)\d{3}-\d{2}-\d{2}$/',
            ],
            'email' => [
                'sometimes',
                'email',
//              'email:rfc,dns',
            ],
        ];
    }

    protected function messages(): array
    {
        return [
            'phone.required' => 'Enter the phone number',
            'phone.regex' => 'Phone number format is invalid',
            'email.email' => 'Email address is invalid',
        ];
    }

    private function hasEmailService(): bool
    {
        return $this->email === '';
    }

}
