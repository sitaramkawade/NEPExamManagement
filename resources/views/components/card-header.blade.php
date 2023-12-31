@props([
    'disabled'=>false,
    'slot'=>false,
    'btntext'=>false,
    'svg'=>false,
    ])

<div class="py-2 overflow-hidden border font-semibold dark:text-light bg-primary">
    <div class="grid grid-cols-2 md:grid-cols-2">
        <p class="text-white text-md font-medium align-middle flex ml-2 text-lg">{{ $slot }}</p>
        <div class="flex justify-end">
            <a  wire:navigate {{ $disabled ? "disabled" : "" }} {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex bg-green-600 items-center border px-2 mr-2 py-1 rounded-md font-semibold text-base text-white tracking-widest']) }}>
                {{ $svg }}
                {{ $btntext }}
            </a>
        </div>
    </div>
</div>