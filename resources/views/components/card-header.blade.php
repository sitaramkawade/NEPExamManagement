@props([
    'disabled'=>false,
    'slot'=>false,
    'button'=>false,
    ])

<div class="py-2 overflow-hidden border font-semibold dark:border-primary-darker dark:text-light bg-primary-darker">
    <div class="grid grid-cols-2 md:grid-cols-2">
        <p class="text-white text-md font-medium align-middle flex ml-2 text-lg">{{ $slot }}</p>
        <div class="flex justify-end px-2">
            {{ $button }}
        </div>
    </div>
</div>
