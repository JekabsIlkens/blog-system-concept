@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm/6 font-medium text-neutral-900']) }}>
    {{ $value }}
</label>
