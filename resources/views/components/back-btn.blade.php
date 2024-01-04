@props(['disabled' => false])

<span  {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center border px-4 py-2 mr-2 bg-green-600 rounded-md font-semibold text-sm text-white tracking-widest']) }}>
    Back
</span>