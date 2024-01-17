<x-card-collapsible heading="Subject Bucket Details">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="type_name" :value="__('Subject Type Name')" />
            @if ($isDisabled)
                <x-text-input id="type_name" type="text" :value="$type_name" disabled class="bg-gray-100 cursor-not-allowed @error('type_name') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('type_name')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="type_shortname" :value="__('Subject Type Shortname')" />
            @if ($isDisabled)
                <x-text-input id="type_shortname" type="text" :value="$type_shortname" disabled class="bg-gray-100 cursor-not-allowed @error('type_shortname') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('type_shortname')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="active" :value="__('Status')" />
            @if ($isDisabled)
                <x-text-input id="active" type="text" :value="$active" disabled class="bg-gray-100 cursor-not-allowed @error('active') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('active')" class="mt-2" />
        </div>
    </div>
</x-card-collapsible>
