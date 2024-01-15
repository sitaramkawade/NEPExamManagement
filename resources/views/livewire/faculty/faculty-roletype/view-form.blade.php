<x-card-collapsible heading="Role Type Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="roletype_name" :value="__('Role Type Name')" />
            @if ($isDisabled)
                <x-text-input id="roletype_name" type="text" :value="$roletype_name" disabled class="bg-gray-100 cursor-not-allowed @error('roletype_name') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('roletype_name')" class="mt-2" />
        </div>
    </div>
</x-card-collapsible>
