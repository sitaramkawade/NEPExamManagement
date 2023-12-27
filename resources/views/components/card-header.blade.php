@props(['disabled' => false,'slot'=>false])

<div {{ $disabled ? 'disabled' : '' }} class="py-2 overflow-hidden border font-semibold dark:text-light bg-primary">
    <div class="grid grid-cols-2 md:grid-cols-2">
        <p class="text-white text-md font-medium align-middle flex ml-2 text-lg">{{ $slot }}a</p>
    </div>
</div>