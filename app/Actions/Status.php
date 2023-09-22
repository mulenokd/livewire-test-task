<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Contracts\View\View;
use Lorisleiva\Actions\Action;

class Status extends Action
{
    public function handle(): View
    {
        return view('pages.status');
    }
}