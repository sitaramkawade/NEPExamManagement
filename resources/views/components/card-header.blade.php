@props([
    'disabled'=>false,
    'slot'=>false,
    'btntext'=>false,
    'svg'=>false,
    ])

<div class="py-2 overflow-hidden border font-semibold dark:border-primary-darker dark:text-light bg-primary-darker">
    <div class="grid grid-cols-2 md:grid-cols-2">
        <p class="text-white text-md font-medium align-middle flex ml-2 text-lg">{{ $slot }}</p>
        <div class="flex justify-end">
            <a  wire:navigate {{ $disabled ? "disabled" : "" }} {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex text-white bg-transparent border hover:bg-primary hover:text-white items-center border px-4 py-2 mr-2 rounded-md font-semibold text-sm tracking-widest']) }}>
                {{ $svg }}
                {{ $btntext }}
            </a>
        </div>
    </div>
</div>
