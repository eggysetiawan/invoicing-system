<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFruitItemRequest;
use App\Http\Requests\UpdateFruitItemRequest;
use App\Models\FruitItem;

class FruitItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fruitItems = FruitItem::query()
            ->with('fruitCategory:id,name')
            ->latest('updated_at')
            ->get();

        return view('fruit_items.index', compact('fruitItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fruit_items.create', [
            'fruitItem' => new FruitItem(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFruitItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FruitItem $fruitItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FruitItem $fruitItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFruitItemRequest $request, FruitItem $fruitItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FruitItem $fruitItem)
    {
        //
    }
}
