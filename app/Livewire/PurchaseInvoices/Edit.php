<?php

namespace App\Livewire\PurchaseInvoices;


class Edit extends \App\Livewire\PurchaseComponent
{
    public \Illuminate\Support\Carbon $updated_at;
    public string $originalCustomer;
    public function mount(\App\Models\Purchase $purchase)
    {
        $this->purchase = $purchase;

        $this->customer = $purchase->customer;

        $this->originalCustomer = $purchase->customer;

        $this->updated_at = $purchase->updated_at;

        $this->fruits = $this->getFruits();

        $this->count = count($this->fruits);

        $this->button = 'update';

        $this->fruitItems = \App\Models\FruitItem::query()
            ->orderBy('name')
            ->get(['id', 'name', 'unit', 'price']);
    }

    public function getFruits()
    {
        $fruits = [];

        $purchases =  \App\Models\Purchase::query()
            ->with('fruitItem.fruitCategory')
            ->where('slug', $this->purchase->slug)
            ->get();

        foreach ($purchases as $purchase) {

            $fruits[] = [
                'fruit_item_id' => $purchase->fruit_item_id,
                'category'      => $purchase->fruitItem->fruitCategory->name,
                'unit'          => $purchase->fruitItem->unit,
                'price'         => $purchase->fruitItem->price,
                'qty'           => $purchase->qty,
                'amount'        => $purchase->amount,
                'created_at'    => $purchase->created_at,
                'updated_at'    => $purchase->updated_at,
            ];
        }

        return $fruits;
    }


    public function handleSubmitPurchaseInvoice(): void
    {
        $logs = [];

        try {

            \Illuminate\Support\Facades\DB::beginTransaction();

            \App\Models\Purchase::query()
                ->where('customer', $this->originalCustomer)
                ->where('updated_at', $this->updated_at)
                ->delete();

            \App\Models\Purchase::insert($this->getAttr());

            $logLevel = 'info';

            $logs['message'] = 'Purchase successfully updated.';

            $logs['context']['message'] = 'Success';

            \Illuminate\Support\Facades\DB::commit();
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\DB::rollBack();

            $logLevel = 'error';

            $logs['message'] = 'Purchase update failed';

            $logs['context']['message'] = $e->getMessage();
            $logs['context']['line_num'] = $e->getLine();
        }

        \Illuminate\Support\Facades\Log::$logLevel($logs['message'], $logs['context']);

        session()->flash('message', __($logs['message']));

        $this->redirectRoute('purchase_invoices.index');
    }

    public function remove()
    {
        $this->count--;
        array_pop($this->fruits);
    }
}
