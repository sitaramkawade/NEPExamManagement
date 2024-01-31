<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Subject Type Detail's
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="type_name" :value="__('Subject Type Name')" />
            <x-text-input id="type_name" type="text" wire:model="type_name" name="type_name" placeholder="Subject Type Name" class=" @error('type_name') is-invalid @enderror w-full mt-1" :value="old('type_name', $type_name)" required autofocus autocomplete="type_name" />
            <x-input-error :messages="$errors->get('type_name')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="type_shortname" :value="__('Subject Type Shortname')" />
            <x-text-input id="type_shortname" type="text" wire:model="type_shortname" name="type_shortname" placeholder="Subject Type Shortname" class=" @error('type_shortname') is-invalid @enderror w-full mt-1" :value="old('type_shortname', $type_shortname)" required autofocus autocomplete="type_shortname" />
            <x-input-error :messages="$errors->get('type_shortname')" class="mt-2" />
        </div>
    </div>
    <x-form-btn>Submit</x-form-btn>
</div>
