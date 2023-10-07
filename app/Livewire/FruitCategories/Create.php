<?php

namespace App\Livewire\FruitCategories;

use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public string $name;
    public bool $disabled;

    public function mount()
    {
        $this->name = '';
        $this->disabled = true;
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100', 'unique:fruit_categories,name'],
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function handleSubmitCategory()
    {
        $this->validate();

        \App\Models\FruitCategory::create([
            'name' => $name = $this->name,
            'slug' => Str::slug($name),
        ]);

        session()->flash('message', __('Fruit category succesfully created.'));


        $this->redirectRoute('fruit_categories.index');
    }

    public function render()
    {
        return view('livewire.fruit-categories.create');
    }
}
