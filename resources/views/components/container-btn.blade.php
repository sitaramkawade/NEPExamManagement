@props(['disabled'=> false, 'btntext'=> false,'svg' => false,])

<a  wire:navigate {{ $disabled ? "disabled" : "" }} {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 rounded-md font-semibold text-sm text-white tracking-widest']) }}>
    {{ $svg }}
    {{ $btntext }}
</a>
