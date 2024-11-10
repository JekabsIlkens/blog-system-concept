@props(['for'])

@error($for)
    <div {{ $attributes->merge(['class' => 'block text-sm font-medium text-amber-600']) }} >
        {{ $message }}
    </div>
@enderror
