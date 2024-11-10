<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-md bg-amber-800 px-4 py-2 text-sm font-medium text-white shadow-md hover:bg-amber-700']) }}>
    {{ $slot }}
</button>
