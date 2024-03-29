<x-card-collapsible heading="Role Type Details">
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="roletype_name" :value="__('Role Type Name')" />
            <x-text-input id="roletype_name" type="text" wire:model="roletype_name" name="roletype_name" placeholder="Role Type Name" class=" @error('roletype_name') is-invalid @enderror w-full mt-1" :value="old('roletype_name', $roletype_name)" required autofocus autocomplete="roletype_name" />
            <x-input-error :messages="$errors->get('roletype_name')" class="mt-2" />
        </div>
    </div>
    <x-form-btn>Submit</x-form-btn>
</x-card-collapsible>
