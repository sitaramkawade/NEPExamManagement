@props(['disabled' => false])

<button  type="button" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['type' => 'submit', 'class' => 'mx-3 cursor-pointer  inline-flex items-center border w-[70px] px-4 py-1.5 bg-green-600 rounded-md font-semibold text-sm text-white tracking-widest']) }}>
    Back
</button>
