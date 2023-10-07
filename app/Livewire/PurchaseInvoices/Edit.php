<?php

namespace App\Livewire\PurchaseInvoices;


class Edit extends \App\Livewire\PurchaseComponent

{
    public function mount(\App\Models\Purchase $purchase)
    {
        // $this->count = 1;
        $this->fruits = $this->getFruits($purchase);

        $this->fruitItems = \App\Models\FruitItem::query()
            ->orderBy('name')
            ->get(['id', 'name', 'unit', 'price']);
        // $this->fruits = [];
    }

    public function getFruits(\App\Models\Purchase $purchase)
    {
        $fruits = [];

        $purchases =  \App\Models\Purchase::query()
            ->with('fruitItem.fruitCategory')
            ->where('slug', $purchase->slug)
            ->get(['id', 'customer', 'fruit_item_id', 'qty', 'amount']);

        foreach ($purchases as $purchase) {
            $fruits[] = [
                'fruit_item_id' => $purchase->fruit_item_id,
                'category' => $purchase->fruitItem->fruitCategory->name,
                'unit' => $purchase->fruitItem->unit,
                'price' => $purchase->fruitItem->price,
                'qty' => $purchase->qty,
                'amount' => $purchase->amount,
            ];
        }

        return $fruits;
    }
}
