<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Subject Type Detail's
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="type_name" :value="__('Subject Type Name')" />
            @if ($isDisabled)
                <x-text-input id="type_name" type="text" :value="$type_name" disabled class="bg-gray-100 cursor-not-allowed @error('type_name') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="description" :value="__('Subject Type Shortname')" />
            @if ($isDisabled)
                <x-text-input id="description" type="text" :value="$description" disabled class="bg-gray-100 cursor-not-allowed @error('description') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</div>
