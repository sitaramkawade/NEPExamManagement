@props(['disabled' => false, 'btntext' => false, 'svg' => false])

<a wire:navigate {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center border px-4 py-2 mr-2 bg-green-600 rounded-md font-semibold text-sm text-white tracking-widest']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
    </svg>
    Back
</a>
