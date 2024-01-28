<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Faculty Head Detail's
    </div>
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
    <x-form-btn>Submit</x-form-btn>
  </div>
