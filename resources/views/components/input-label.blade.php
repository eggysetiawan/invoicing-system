@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm sm:text-xs text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
