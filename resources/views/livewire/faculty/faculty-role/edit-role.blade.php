<div>
    <x-card-header href="{{ route('faculty.view-role.faculty') }}">
        Edit Role
        <x-slot name="svg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 mr-1 mt-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
        </x-slot>
        <x-slot name="btntext">Back</x-slot>
    </x-card-header>

    <form wire:submit="update({{ $role_id }})" method="post" action="" id="myForm">
        <x-card-collapsible heading="Role Details">
            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                        <x-input-label for="role_name" :value="__('Role Name')" />
                        <x-text-input id="role_name" type="text" wire:model="role_name" name="role_name" placeholder="Role Name" class=" @error('role_name') is-invalid @enderror w-full mt-1" :value="old('role_name', $role_name)" required autofocus autocomplete="role_name" />
                        <x-input-error :messages="$errors->get('role_name')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                        <x-input-label for="roletype_id" :value="__('Roletype')" />
                        <x-input-select id="roletype_id" wire:model.live="roletype_id" name="roletype_id" class="text-center @error('roletype_id') is-invalid @enderror w-full mt-1" :value="old('roletype_id', $roletype_id)" required autofocus autocomplete="roletype_id">
                            <x-select-option class="text-start" hidden> -- Select Roletype -- </x-select-option>
                            @foreach ($roletypes as $roletype)
                                <x-select-option wire:key="{{ $roletype->id }}" value="{{ $roletype->id }}" class="text-start">{{ $roletype->roletype_name }}</x-select-option>
                            @endforeach
                        </x-input-select>
                        <x-input-error :messages="$errors->get('roletype_id')" class="mt-2" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1">
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                        <x-input-label for="college_id" :value="__('College')" />
                        <x-input-select id="college_id" wire:model.live="college_id" name="college_id" class="text-center @error('college_id') is-invalid @enderror w-full mt-1" :value="old('college_id', $college_id)" required autofocus autocomplete="college_id">
                            <x-select-option class="text-start" hidden> -- Select College -- </x-select-option>
                            @foreach ($colleges as $college)
                                <x-select-option wire:key="{{ $college->id }}" value="{{ $college->id }}" class="text-start">{{ $college->college_name }}</x-select-option>
                            @endforeach
                        </x-input-select>
                        <x-input-error :messages="$errors->get('college_id')" class="mt-2" />
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
