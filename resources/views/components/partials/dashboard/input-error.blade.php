@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class']) }}>
        @foreach ((array) $messages as $message)
            <li class="mt-2 text-sm font-medium text-red-500">{{ $message }}</li>
        @endforeach
    </ul>
@endif
