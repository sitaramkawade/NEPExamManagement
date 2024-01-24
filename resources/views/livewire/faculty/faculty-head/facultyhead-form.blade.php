<x-card-collapsible heading="Faculty Head Details">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="faculty_id" :value="__('Faculty Name')" />
            <x-input-select id="faculty_id" wire:model="faculty_id" name="faculty_id" class="text-center @error('faculty_id') is-invalid @enderror w-full mt-1" :value="old('faculty_id', $faculty_id)" required autofocus autocomplete="faculty_id">
                <x-select-option class="text-start" hidden> -- Select Faculty -- </x-select-option>
                @foreach ($faculties as $faculty)
                    <x-select-option wire:key="{{ $faculty->id }}" value="{{ $faculty->id }}" class="text-start">{{ $faculty->faculty_name }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('faculty_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="department_id" :value="__('Department Name')" />
            <x-input-select id="department_id" wire:model="department_id" name="department_id" class="text-center @error('department_id') is-invalid @enderror w-full mt-1" :value="old('department_id', $department_id)" required autofocus autocomplete="department_id">
                <x-select-option class="text-start" hidden> -- Select Department -- </x-select-option>
                @foreach ($departments as $department)
                    <x-select-option wire:key="{{ $department->id }}" value="{{ $department->id }}" class="text-start">{{ $department->dept_name }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="status" :value="__('Status')" />
            <x-input-select id="status" wire:model="status" name="status" class="text-center @error('status') is-invalid @enderror w-full mt-1" :value="old('status', $status)" required autofocus autocomplete="status">
                <x-select-option class="text-start" hidden> -- Select Status -- </x-select-option>
                <x-select-option class="text-start" value=0>Inactive</x-select-option>
                <x-select-option class="text-start" value=1>Active</x-select-option>
            </x-input-select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>
    </div>
    <x-form-btn>Submit</x-form-btn>
</x-card-collapsible>
