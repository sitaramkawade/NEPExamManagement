<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        HOD Appointment Details
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
            <x-input-label for="pattern_id" :value="__('Pattern')" />
            <x-input-select id="pattern_id" wire:model.live="pattern_id" name="pattern_id" class="text-center w-full mt-1" :value="old('pattern_id', $pattern_id)" required autocomplete="pattern_id">
                <x-select-option class="text-start" hidden> -- Select Pattern -- </x-select-option>
                @forelse ($patterns as $ptn)
                    <x-select-option wire:key="{{ $ptn->id }}" value="{{ $ptn->id }}" class="text-start"> {{ $ptn->pattern_name }} </x-select-option>
                @empty
                    <x-select-option class="text-start">Patterns Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('pattern_id')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
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
            <x-input-label for="course_class_id" :value="__('Class')" _class />
            <x-input-select id="course_class_id" wire:model.live="course_class_id" name="course_class_id" class="text-center w-full mt-1" :value="old('course_class_id', $course_class_id)" required autocomplete="course_class_id">
                <x-select-option class="text-start" hidden> -- Select Class -- </x-select-option>
                @forelse ($pattern_classes as $pattern_class)
                    <x-select-option wire:key="{{ $pattern_class->id }}" value="{{ $pattern_class->id }}" class="text-start"> {{ $pattern_class->courseclass->classyear->classyear_name }} {{ $pattern_class->courseclass->course->course_name ?? '' }} </x-select-option>
                @empty
                    <x-select-option class="text-start"> Classes Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('course_class_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="courseclass_subject_id" :value="__('Subject Name')" />
            <x-input-select id="courseclass_subject_id" wire:model="courseclass_subject_id" name="courseclass_subject_id" class="text-center @error('courseclass_subject_id') is-invalid @enderror w-full mt-1" :value="old('courseclass_subject_id', $courseclass_subject_id)" required autofocus autocomplete="courseclass_subject_id">
                <x-select-option class="text-start" hidden> -- Select Subject -- </x-select-option>
                @forelse ($courseclass_subjects as $courseclass_subject)
                    <x-select-option wire:key="{{ $courseclass_subject->id }}" value="{{ $courseclass_subject->id }}" class="text-start"> {{ $courseclass_subject->subject_name }} </x-select-option>
                @empty
                    <x-select-option class="text-start"> Subject Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('courseclass_subject_id')" class="mt-2" />
        </div>
    </div>
    <x-form-btn>Submit</x-form-btn>
  </div>
