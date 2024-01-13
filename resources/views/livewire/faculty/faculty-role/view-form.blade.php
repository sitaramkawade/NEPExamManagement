<x-card-collapsible heading="Role Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="role_name" :value="__('Role Name')" />
            @if ($isDisabled)
                <x-text-input id="role_name" type="text" :value="$role_name" disabled class="bg-gray-100 cursor-not-allowed @error('role_name') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('role_name')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="roletype_id" :value="__('Roletype')" />
            @unless ($isDisabled)
                <x-text-input id="roletype_id" type="text" wire:model="roletype_id" name="roletype_id" class="@error('roletype_id') is-invalid @enderror w-full mt-1" :value="$roletype_id->roletype_name" required />
            @else
                <x-text-input id="roletype_id" type="text" :value="optional($roletype_id)->roletype_name ?? ''" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="roletype_id" />
            @endunless
            <x-input-error :messages="$errors->get('roletype_id')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="college_id" :value="__('Role')" />
            @unless ($isDisabled)
                <x-text-input id="college_id" type="text" wire:model="college_id" name="college_id" class="@error('college_id') is-invalid @enderror w-full mt-1" :value="$college_id->college_name" required />
            @else
                <x-text-input id="college_id" type="text" :value="optional($college_id)->college_name ?? ''" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="college_id" />
            @endunless
            <x-input-error :messages="$errors->get('college_id')" class="mt-2" />
        </div>
    </div>
</x-card-collapsible>
