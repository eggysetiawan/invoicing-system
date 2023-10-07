<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFruitCategoryRequest;
use App\Http\Requests\UpdateFruitCategoryRequest;
use App\Models\FruitCategory;

class FruitCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $fruitCategories = FruitCategory::query()
            ->latest('updated_at')
            ->get();

        return view('fruit_categories.index', compact('fruitCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fruit_categories.create', [
            'fruitCategory' => new FruitCategory(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFruitCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FruitCategory $fruitCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FruitCategory $fruitCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFruitCategoryRequest $request, FruitCategory $fruitCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FruitCategory $fruitCategory)
    {
        //
    }
}
