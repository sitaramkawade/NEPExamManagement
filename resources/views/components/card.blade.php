@props([
    'heading' => false,
    'content' => false,
    'slot' => false,
])

<div class="m-2 pb-3 overflow-hidden bg-white border rounded shadow dark:border-primary-darker dark:bg-darker">
    <div class="px-2 py-2 font-semibold text-white dark:text-light bg-primary">
        <div class="grid grid-cols-2 md:grid-cols-2 items-center">
            <div class="heading pt-1">
                <p class="text-white text-lg font-bold">{{ $heading }}</p>
            </div>
            @if ($slot)
                <div class="flex justify-end">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>
    <div class="row text-white">
        <div class="grid grid-cols-1 md:grid-cols-1">
            {{ $content }}
        </div>
    </div>
</div>
