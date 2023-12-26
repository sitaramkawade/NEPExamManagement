@props([
    'heading' => false,
    'content' => false,
    'slot' => false,
    'collapse' => false,
])

<div class="m-2 pb-3 overflow-hidden border rounded shadow">
    <div class="px-2 py-2 font-semibold dark:text-light bg-primary">
        <div class="grid grid-cols-2 md:grid-cols-2 items-center">
            <div class="heading pt-1">
                <p class="text-white text-lg font-bold">{{ $heading }}</p>
            </div>
            @if ($slot)
                <div class="flex justify-end">
                    {{ $slot }}
                    {{ $collapse }}
                </div>
            @endif
        </div>
    </div>
    <div>
        <div class="grid grid-cols-1 md:grid-cols-1">
            {{ $content }}
        </div>
    </div>
</div>
