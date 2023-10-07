<?php

namespace App\Livewire\FruitItems;

use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public \Illuminate\Database\Eloquent\Collection $categories;

    public int $category;
    public string $name;
    public string $unit;
    public float $price;

    public function mount()
    {
        $this->categories = \App\Models\FruitCategory::query()->orderBy('name')->get();
        $this->category = 0;
    }

    public function rules(): array
    {
        return [
            'category' => ['required', 'integer', 'exists:fruit_categories,id'],
            'name' => [
                'required', 'string', 'min:2', 'max:100',
                \Illuminate\Validation\Rule::unique('fruit_items', 'name')->where(function (\Illuminate\Database\Query\Builder $query) {
                    $query->where('fruit_category_id', $this->category)
                        ->where('name', $this->name);
                })
            ],
            'unit' => ['required', 'string', 'in:kg,pcs,pack'],
            'price' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function handleSubmitItem()
    {
        $this->validate();

        \App\Models\FruitItem::create([
            'fruit_category_id' => $this->category,
            'name' => $name = $this->name,
            'slug' => Str::slug($name),
            'unit' => $this->unit,
            'price' => $this->price,
        ]);

        session()->flash('message', __('Fruit item succesfully created.'));

        $this->redirectRoute('fruit_items.index');
    }

    public function render()
    {
        return view('livewire.fruit-items.create');
    }
}
