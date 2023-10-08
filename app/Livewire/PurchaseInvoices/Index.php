<?php

namespace App\Livewire\PurchaseInvoices;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;

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

    public function destroy(string $slug)
    {
        \App\Models\Purchase::query()
            ->where('slug', $slug)
            ->delete();

        session()->flash('message', 'Purchase invoice successfully deleted');

        $this->redirectRoute('purchase_invoices.index');
    }

    public function print(string $slug)
    {
        $purchaseInvoices = \App\Models\Purchase::query()
            ->with([
                'fruitItem.fruitCategory:id,name',
                'fruitItem:id,unit,price,fruit_category_id,name',
            ])
            ->where('slug', $slug)
            ->latest('updated_at')
            ->get();


        $pdf = Pdf::loadView('shared.purchase-invoices.table', ['purchaseInvoices' => $purchaseInvoices,]);

        return $pdf->stream();
    }

    public function render()
    {
        return view('livewire.purchase-invoices.index');
    }
}
