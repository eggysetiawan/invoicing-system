<?php

namespace App\Livewire\PurchaseInvoices;

use Livewire\Component;

class Index extends Component
{
    public \Illuminate\Database\Eloquent\Collection $purchaseInvoices;

    public function mount()
    {
        $this->purchaseInvoices = \App\Models\Purchase::query()
            ->with('fruitItem.fruitCategory:id,name')
            ->latest('updated_at')
            ->groupBy('customer')
            ->get();
    }
    public function render()
    {
        return view('livewire.purchase-invoices.index');
    }
}
