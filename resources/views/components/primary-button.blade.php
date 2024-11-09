<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-md bg-amber-600 px-3 py-1.5 text-sm/6 font-semibold text-white uppercase shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600']) }}>
    {{ $slot }}
</button>
