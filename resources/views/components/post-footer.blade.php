@props(['author', 'date'])

<div class="text-sm/6">
    <p class="font-semibold text-amber-600">
        Author: 
        <span class="font-normal text-neutral-600">
            {{ $author }}
        </span>
    </p>

    <p class="font-semibold text-amber-600">
        Posted: 
        <span class="font-normal text-neutral-600">
            {{ $date }}
        </span>
    </p>
</div>
