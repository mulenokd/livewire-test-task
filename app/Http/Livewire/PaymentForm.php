<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Exceptions\CreatePaymentException;
use Livewire\Component;
use Throwable;

abstract class PaymentForm extends Component
{
    public string $amount = '';
    public string $currencyCode = '';
    public string $formattedAmount = '';

    public bool $componentInit = false;

    public function componentInit(): void
    {
        $this->componentInit = true;
    }

    public function mount(): void
    {
        $this->formattedAmount = currency_format($this->amount, $this->currencyCode);
    }

    public function updated(string $field): void
    {
        $this->resetErrorBag($field);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->createPayment();
            return redirect()->route('page.status');
        } catch (CreatePaymentException $e) {
            $this->addError('general', 'Error while creating payment');
        } catch (Throwable $th) {
            $this->addError('general', 'Something went wrong');
        }
    }

    /**
     * Request to provider and create a payment
     * But here we have just test implementation
     */
    protected function createPayment(): void
    {
        if (rand(1, 10) > 7) {
            throw new CreatePaymentException();
        }
    }
}
