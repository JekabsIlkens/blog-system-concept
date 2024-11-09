@props(['for'])

@if ($errors->has($for))
    <div class="block text-sm/6 font-medium text-amber-600">
        {{ $errors->first($for) }}
    </div>
@endif
