<div>
    <x-card-header href="{{ route('faculty.view-roletype.faculty') }}">
        Add Role Type
        <x-slot name="svg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 mr-1 mt-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
        </x-slot>
        <x-slot name="btntext">Back</x-slot>
    </x-card-header>

    <form wire:submit="add()" method="post" action="" id="myForm">
        <x-card-collapsible heading="Role Type Details">
            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                        <x-input-label for="roletype_name" :value="__('Role Type Name')" />
                        <x-text-input id="roletype_name" type="text" wire:model="roletype_name" name="roletype_name" placeholder="Role Type Name" class=" @error('roletype_name') is-invalid @enderror w-full mt-1" :value="old('roletype_name', $roletype_name)" required autofocus autocomplete="roletype_name" />
                        <x-input-error :messages="$errors->get('roletype_name')" class="mt-2" />
                    </div>
                </div>
                <div class="flex justify-end pr-4">
                    <x-form-btn>
                        <x-slot name="btntext">
                            Submit
                        </x-slot>
                    </x-form-btn>
                </div>
            </x-slot>
        </x-card-collapsible>
    </form>
</div>
