<?php

namespace App\Livewire;


use Illuminate\Support\Str;

class PurchaseComponent extends \Livewire\Component
{

    public int $count;
    public string $customer;
    public \Illuminate\Database\Eloquent\Collection $fruitItems;
    public array $fruits;
    public string $button = 'save';
    public function add()
    {
        $this->count++;
    }

    public function remove()
    {
        $this->count--;
    }

    public function handleSubmitPurchaseInvoice()
    {
        $attr = [];

        foreach ($this->fruits as $fruit) {
            unset(
                $fruit['category'],
                $fruit['unit'],
                $fruit['price'],
            );

            $fruit['customer'] = $name = $this->customer;
            $fruit['slug'] = Str::slug($name);
            $fruit['created_at'] = $now = now();
            $fruit['updated_at'] = $now;
            $attr[] = $fruit;
        }

        session()->flash('message', __('Purchase successfully created.'));

        \App\Models\Purchase::insert($attr);

        $this->redirectRoute('purchase_invoices.index');
    }

    protected bool $withKey;
    protected string $key;
    protected array $newValue;


    public function updatedFruits($value, $key)
    {
        if (!is_numeric($key)) {

            $explode = explode('.', $key);

            $newKey = $explode[1];
            $key = $explode[0];

            // rearrange array
            $value = [
                $newKey => $value,
            ];
        }

        if (isset($value['fruit_item_id'])) {
            $fruitItem = \App\Models\FruitItem::query()->with('fruitCategory:id,name')->where('id', $value['fruit_item_id'])->first();

            $this->fruits[$key]['category'] = $fruitItem->fruitCategory->name;
            $this->fruits[$key]['unit']     = $fruitItem->unit;
            $this->fruits[$key]['price']    = $fruitItem->price;
            $this->fruits[$key]['qty']      = 1;
            $this->fruits[$key]['amount']   = $fruitItem->price;
            return;
        }

        $qty = $this->fruits[$key]['qty'] === '' ? 0 : $this->fruits[$key]['qty'];
        $this->fruits[$key]['amount'] = $this->fruits[$key]['price'] * $qty;
    }


    public function render()
    {
        return view('livewire.purchase-invoices.create');
    }
}
