<x-card-collapsible heading="Role Type Details">
    <x-slot name="content">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="roletype_name" :value="__('Role Type Name')" />
                @if ($isDisabled)
                    <x-text-input id="roletype_name" type="text" :value="$roletype_name" disabled class="bg-gray-100 cursor-not-allowed @error('roletype_name') is-invalid @enderror w-full mt-1" />
                @else
                    <x-text-input id="roletype_name" type="text" wire:model="roletype_name" name="roletype_name" class="@error('roletype_name') is-invalid @enderror w-full mt-1" :value="$roletype_name" required autofocus autocomplete="roletype_name" />
                @endif
                <x-input-error :messages="$errors->get('roletype_name')" class="mt-2" />
            </div>
        </div>
    </x-slot>
</x-card-collapsible>
