<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-md bg-amber-600 px-4 py-2 text-sm font-medium text-white uppercase shadow-md hover:bg-amber-500']) }}>
    {{ $slot }}
</button>
