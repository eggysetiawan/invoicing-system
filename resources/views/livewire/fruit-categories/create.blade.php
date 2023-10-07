<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Fruit Category') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add new fruit categories') }}
        </p>
    </header>

    <form wire:submit="handleSubmitCategory" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model.live.debounce.550ms="name" id="name" name="name" type="text"
                class="mt-1 block w-full" autofocus autocomplete="name" placeholder="ex: apple, mango, orange" />
            @error('name')
                <x-input-error class="mt-2" :messages="$message" />
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <x-submit>{{ __('Save') }}</x-submit>
        </div>
    </form>
</section>
