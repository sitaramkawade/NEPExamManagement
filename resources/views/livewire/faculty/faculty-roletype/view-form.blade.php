<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Roletype Detail's
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="roletype_name" :value="__('Roletype Name')" />
            @if ($isDisabled)
                <x-text-input id="roletype_name" type="text" :value="$roletype_name" disabled class="bg-gray-100 cursor-not-allowed @error('roletype_name') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</div>
