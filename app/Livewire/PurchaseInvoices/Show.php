<?php

namespace App\Livewire\PurchaseInvoices;

use Livewire\Component;

class Show extends Component
{
    public \Illuminate\Database\Eloquent\Collection $purchaseInvoices;

    public function mount(\App\Models\Purchase $purchase)
    {
        $this->purchaseInvoices = \App\Models\Purchase::query()
            ->with([
                'fruitItem.fruitCategory:id,name',
                'fruitItem:id,unit,price,fruit_category_id,name',
            ])
            ->where('slug', $purchase->slug)
            ->latest('updated_at')
            ->get();
    }
    public function render()
    {
        return view('livewire.purchase-invoices.show');
    }
}
