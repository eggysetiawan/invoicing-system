<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseController extends Controller
{
    public function __invoke(Purchase $purchase)
    {
        $purchaseInvoices = \App\Models\Purchase::query()
            ->with([
                'fruitItem.fruitCategory:id,name',
                'fruitItem:id,unit,price,fruit_category_id,name',
            ])
            ->where('slug', $purchase->slug)
            ->latest('updated_at')
            ->get();

        $pdf = Pdf::loadView('shared.purchase-invoices.table', ['purchaseInvoices' => $purchaseInvoices,]);

        return $pdf->stream();
    }
}
