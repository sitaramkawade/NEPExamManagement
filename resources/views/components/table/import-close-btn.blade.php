@props(['disabled' => false])

<button type="button"  {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['type' => 'submit', 'class' => ' float-right h-10 cursor-pointer inline-flex items-center  px-4 py-2 mr-2 bg-red-500 rounded-md font-semibold text-xs text-white tracking-widest']) }}>
    Close
</button>
