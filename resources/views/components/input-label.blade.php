@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm dark:text-white text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
