<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Purchase Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Purchase Invoice') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Add new purchase invoice') }}
                            </p>
                        </header>

                        <form wire:submit="handleSubmitPurchaseInvoice" class="mt-6 space-y-6">
                            <div>
                                <x-input-label for="customer" :value="__('Customer Name')" />
                                <x-text-input wire:model.live.debounce.550ms="customer" id="customer" name="customer"
                                    type="text" class="mt-1 block w-full" autofocus autocomplete="customer"
                                    placeholder="ex: john doe" />
                                @error('customer')
                                    <x-input-error class="mt-2" :messages="$message" />
                                @enderror
                            </div>
                            @for ($i = 0; $i < $count; $i++)
                                <div wire:key="{{ $i }}">
                                    <span class="inline-grid grid-cols-6 gap-1">
                                        <div>
                                            <x-input-label for="fruitItem" :value="__('Fruit Item')" />
                                            <select name="fruitItem"
                                                wire:model.live='fruits.{{ $i }}.fruit_item_id'
                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                                <option value="">{{ __('Select Fruit Item') }}</option>
                                                @foreach ($fruitItems as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error("fruits.$i.fruitItem")
                                                <x-input-error class="mt-2" :messages="$message" />
                                            @enderror
                                        </div>
                                        <div>
                                            <x-input-label for="category" :value="__('Fruit Category')" />
                                            <x-text-input disabled
                                                wire:model.live.debounce.550ms="fruits.{{ $i }}.category"
                                                id="category" name="category" type="text"
                                                class="mt-1 block w-full disabled placeholder:text-sm opacity-50"
                                                autofocus autocomplete="category"
                                                placeholder="Please select fruit item" />
                                            @error("fruits.$i.category")
                                                <x-input-error class="mt-2" :messages="$message" />
                                            @enderror
                                        </div>
                                        <div>
                                            <x-input-label for="unit" :value="__('Unit')" />
                                            <x-text-input disabled
                                                wire:model.live.debounce.550ms="fruits.{{ $i }}.unit"
                                                id="unit" name="unit" type="text"
                                                class="mt-1 block w-full disabled placeholder:text-sm opacity-50"
                                                autofocus autocomplete="unit" placeholder="Please select fruit item" />
                                            @error("fruits.$i.unit")
                                                <x-input-error class="mt-2" :messages="$message" />
                                            @enderror
                                        </div>
                                        <div>
                                            <x-input-label for="price" :value="__('Price')" />
                                            <x-text-input disabled
                                                wire:model.live.debounce.550ms="fruits.{{ $i }}.price"
                                                id="price" name="price" type="text"
                                                class="mt-1 block w-full disabled placeholder:text-sm opacity-50"
                                                autofocus autocomplete="price" placeholder="Please select fruit item" />
                                            @error("fruits.$i.price")
                                                <x-input-error class="mt-2" :messages="$message" />
                                            @enderror
                                        </div>
                                        <div>
                                            <x-input-label for="qty" :value="__('Qty')" />
                                            <x-text-input
                                                wire:model.live.debounce.550ms="fruits.{{ $i }}.qty"
                                                id="qty" name="qty" type="text" class="mt-1 block w-full"
                                                autofocus autocomplete="qty" placeholder="ex: 10" />
                                            @error("fruits.$i.qty")
                                                <x-input-error class="mt-2" :messages="$message" />
                                            @enderror
                                        </div>
                                        <div>
                                            <x-input-label for="amount" :value="__('Amount')" />
                                            <x-text-input disabled
                                                wire:model.live.debounce.550ms="fruits.{{ $i }}.amount"
                                                id="amount" name="amount" type="text"
                                                class="mt-1 block w-full disabled placeholder:text-sm opacity-50"
                                                autofocus autocomplete="amount" placeholder="Please input qty" />
                                            @error("fruits.$i.amount")
                                                <x-input-error class="mt-2" :messages="$message" />
                                            @enderror
                                        </div>

                                    </span>
                                </div>
                            @endfor
                            <div class="grid grid-cols-2 gap-2">
                                <a wire:click='add'
                                    class="text-center bg-green-600 cursor-pointer rounded-lg px-10 py-2 text-white uppercase">add</a>
                                <a wire:click='remove'
                                    class="text-center  bg-red-600 rounded-lg px-10 py-2 text-white uppercase {{ $count < 2 ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}">remove</a>
                            </div>
                            <div class="flex mt-10 items-center gap-4">
                                <x-submit>{{ __($button) }}</x-submit>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</div>
