@props(['for'])

@error($for)
    <div class="block text-sm/6 font-medium text-amber-600">
        {{ $message }}
    </div>
@enderror
