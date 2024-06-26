<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-deep-koamaru-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-deep-koamaru-500 focus:bg-deep-koamaru-600 active:bg-deep-koamaru-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
