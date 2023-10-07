<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Fruit Item') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add new fruit item') }}
        </p>
    </header>

    <form wire:submit="handleSubmitItem" class="mt-6 space-y-6">
        <div>
            <x-input-label for="category" :value="__('Category')" />
            <select name="category" wire:model.live='category'
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">{{ __('Select Fruit Category') }}</option>
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
            @error('category')
                <x-input-error class="mt-2" :messages="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model.live.debounce.550ms="name" id="name" name="name" type="text"
                class="mt-1 block w-full" autofocus autocomplete="name" placeholder="ex: apple, mango, orange" />
            @error('name')
                <x-input-error class="mt-2" :messages="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="unit" :value="__('Unit')" />
            <select name="unit" wire:model.live='unit'
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">{{ __('Select unit') }}</option>
                <option value="kg">kg</option>
                <option value="pcs">pcs</option>
                <option value="pack">pack</option>
            </select>
            @error('unit')
                <x-input-error class="mt-2" :messages="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input wire:model.live.debounce.550ms="price" id="price" price="price" type="number"
                class="mt-1 block w-full" autofocus autocomplete="price" value="0" />
            @error('price')
                <x-input-error class="mt-2" :messages="$message" />
            @enderror
        </div>
        <div class="flex items-center gap-4">
            <x-submit>{{ __('Save') }}</x-submit>
        </div>
    </form>
</section>
