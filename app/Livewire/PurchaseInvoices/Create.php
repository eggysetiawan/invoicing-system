<?php

namespace App\Livewire\PurchaseInvoices;

use Livewire\Component;
use Illuminate\Support\Str;

class Create extends \App\Livewire\PurchaseComponent
{
    public function mount()
    {
        $this->count = 1;
        $this->fruitItems = \App\Models\FruitItem::query()
            ->orderBy('name')
            ->get(['id', 'name', 'unit', 'price']);
        // $this->fruits = [];
    }
}
