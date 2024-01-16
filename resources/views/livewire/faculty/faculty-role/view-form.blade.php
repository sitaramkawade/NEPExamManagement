<x-card-collapsible heading="Role Details">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="role_name" :value="__('Role Name')" />
            @if ($isDisabled)
                <x-text-input id="role_name" type="text" :value="$role_name" disabled class="bg-gray-100 cursor-not-allowed @error('role_name') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="roletype_id" :value="__('Roletype')" />
            @if ($isDisabled)
                <x-text-input id="roletype_id" type="text" :value="$roletype_id" disabled class="bg-gray-100 cursor-not-allowed @error('roletype_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="college_id" :value="__('Role')" />
            @if ($isDisabled)
                <x-text-input id="college_id" type="text" :value="$college_id" disabled class="bg-gray-100 cursor-not-allowed @error('college_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</x-card-collapsible>
