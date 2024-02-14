<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
       Assigning Subject Detail's
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_name" :value="__('Subject Name')" />
            @if ($isDisabled)
                <x-text-input id="subject_name" type="text" :value="$subject_name" disabled class="bg-gray-100 cursor-not-allowed @error('subject_name') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectcategory_id" :value="__('Subject Category')" />
            <x-input-select id="subjectcategory_id" wire:model.live="subjectcategory_id" name="subjectcategory_id" class="text-center @error('subjectcategory_id') is-invalid @enderror w-full mt-1" :value="old('subjectcategory_id', $subjectcategory_id)" required autofocus autocomplete="subjectcategory_id">
                <x-select-option class="text-start" hidden> -- Select Subject Category -- </x-select-option>
                @forelse ($subject_categories as $subject_category)
                    <x-select-option wire:key="{{ $subject_category->id }}" value="{{ $subject_category->id }}" class="text-start"> {{ $subject_category->subjectcategory }} </x-select-option>
                @empty
                    <x-select-option class="text-start">Subject Category Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('subjectcategory_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="assigning_department_id" :value="__('Department')" />
            <x-input-select id="assigning_department_id" wire:model.live="assigning_department_id" name="assigning_department_id" class="text-center @error('assigning_department_id') is-invalid @enderror w-full mt-1" :value="old('assigning_department_id', $assigning_department_id)" required autofocus autocomplete="assigning_department_id">
                <x-select-option class="text-start" hidden> -- Select Department -- </x-select-option>
                @forelse ($assigning_departments as $assigning_department)
                    <x-select-option wire:key="{{ $assigning_department->id }}" value="{{ $assigning_department->id }}" class="text-start"> {{ $assigning_department->dept_name }} </x-select-option>
                @empty
                    <x-select-option class="text-start">Department Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('assigning_department_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="course_id" :value="__('Course')" />
            <x-input-select id="course_id" wire:model.live="course_id" name="course_id" class="text-center w-full mt-1" :value="old('course_id', $course_id)" required autocomplete="course_id">
                <x-select-option class="text-start" hidden> -- Select Course -- </x-select-option>
                @forelse ($courses as $course)
                    <x-select-option wire:key="{{ $course->id }}" value="{{ $course->id }}" class="text-start"> {{ $course->course_name }} </x-select-option>
                @empty
                    <x-select-option class="text-start">Courses Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="patternclass_id" :value="__('Select Pattern Class')" />
            <x-input-select id="patternclass_id" wire:model.live="patternclass_id" name="patternclass_id" class="text-center w-full mt-1" :value="old('patternclass_id', $patternclass_id)" required autocomplete="patternclass_id">
                <x-select-option class="text-start" hidden> -- Select Pattern Classes -- </x-select-option>
                @forelse ($pattern_classes as $pattern_class)
                    <x-select-option wire:key="{{ $pattern_class->id }}" value="{{ $pattern_class->id }}" class="text-start"> {{ $pattern_class->courseclass->classyear->classyear_name ?? '-' }} {{ $pattern_class->courseclass->course->course_name ?? '-' }} {{ $pattern_class->pattern->pattern_name ?? '-' }} </x-select-option>
                @empty
                    <x-select-option class="text-start">Pattern Classes Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('patternclass_id')" class="mt-1" />
        </div>
    </div>
    <x-form-btn>Submit</x-form-btn>
</div>
