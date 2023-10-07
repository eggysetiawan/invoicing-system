<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function __invoke(Purchase $purchase)
    {
        Purchase::query()
            ->where('slug', $purchase->slug)
            ->delete();

        session()->flash('message', 'Purchase telah berhasil dihapus');
    }
}
