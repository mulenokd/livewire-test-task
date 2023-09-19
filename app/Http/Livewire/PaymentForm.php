<?php

namespace App\Http\Livewire;

use App\Exceptions\CreatePaymentException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use LVR\CreditCard\CardNumber;
use Throwable;

class PaymentForm extends Component
{
    public string $card = '';
    public string $exp = '';
    public string $cvc = '';

    public string $amount = '';
    public string $currencyCode = '';
    public string $formattedAmount = '';

    public bool $componentInit = false;

    public function componentInit()
    {
        $this->componentInit = true;
    }

    public function mount()
    {
        $this->formattedAmount = currency_format($this->amount, $this->currencyCode);
    }

    public function updated(string $field): void
    {
        $this->resetErrorBag($field);
    }

    public function submit()
    {
        try {
            $this->validate();
            $this->createPayment();

            return redirect()->route('page.status');
        } catch (CreatePaymentException $e) {
            $this->addError('general', 'Error while creating payment');
        } catch (ValidationException $e) {
            throw $e;
        } catch (Throwable $th) {
            $this->addError('general', 'Something went wrong');
        }
    }

    public function render()
    {
        return view('livewire.payment-form');
    }

    protected function rules(): array
    {
        return [
            'card' => ['required', new CardNumber],
            'exp' => ['required'],
            'cvc' => ['required', 'size:3'],
        ];
    }

    protected function messages(): array
    {
        return [
            'card.required' => 'Enter the card number',
            'exp.required' => 'Enter the card expiration date',
            'cvc.required' => 'Enter the CVC code',
            'cvc.size' => 'CVC code must be of 3 digits',
        ];
    }

    /**
     * Request to provider and create a payment
     * But here we have just test implementation
     */
    private function createPayment(): void
    {
        if (rand(1, 10) > 7) {
            throw new CreatePaymentException();
        }
    }
}
