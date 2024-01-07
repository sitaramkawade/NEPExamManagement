@props(['disabled' => false])

<button  type="button" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['type' => 'submit', 'class' => ' cursor-pointer  inline-flex items-center border px-4 py-2 bg-green-600 rounded-md font-semibold text-sm text-white tracking-widest']) }}>
    Add
</button>