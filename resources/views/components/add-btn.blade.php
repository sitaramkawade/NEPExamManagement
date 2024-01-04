@props(['disabled' => false])

<span {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex cursor-pointer items-center border px-4 py-2 bg-green-600 rounded-md font-semibold text-sm text-white tracking-widest']) }}>
    Add
</span>
