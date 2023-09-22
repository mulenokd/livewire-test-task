<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Contracts\View\View;
use Lorisleiva\Actions\Action;

class Pay extends Action
{
    private array $availableCurrencies = ['USD'];

    public function handle(): View
    {
        return view('pages.pay', [
            'paymentData' => [
                'amount' => $this->getAmount(),
                'currencyCode' => $this->getCurrencyCode(),
            ]
        ]);
    }

    private function getAmount(): float
    {
        return 29.50;
    }

    private function getCurrencyCode(): string
    {
        return $this->availableCurrencies[0];
    }
}