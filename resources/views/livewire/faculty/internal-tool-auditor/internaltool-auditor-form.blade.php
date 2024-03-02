<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Internal Tool Detail's
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="course_id" :value="__('Course')" />
            <x-input-select id="course_id" wire:model.live="course_id" name="course_id" class="text-center w-full mt-1" :value="old('course_id', $course_id)" required autocomplete="course_id">
                <x-select-option class="text-start" hidden> -- Select Course -- </x-select-option>
                @forelse ($courses as $courseid => $coursename)
                    <x-select-option wire:key="{{ $courseid }}" value="{{ $courseid }}" class="text-start"> {{ $coursename }} </x-select-option>
                @empty
                    <x-select-option class="text-start">Courses Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="patternclass_id" :value="__('Select Pattern Class')" />
            <x-input-select id="patternclass_id" wire:model.live="patternclass_id" name="patternclass_id" class="text-center w-full mt-1" :value="old('patternclass_id', $patternclass_id)" required autocomplete="patternclass_id">
                <x-select-option class="text-start" hidden>-- Select Pattern Classes --</x-select-option>
                @forelse ($pattern_classes as $pattern_class)
                    <x-select-option wire:key="{{ $pattern_class->id }}" value="{{ $pattern_class->id }}" class="text-start"> {{ $pattern_class->courseclass->classyear->classyear_name ?? '-' }} {{ $pattern_class->courseclass->course->course_name ?? '-' }} {{ $pattern_class->pattern->pattern_name ?? '-' }} </x-select-option>
                @empty
                    <x-select-option class="text-start" wire:loading.remove>Pattern Classes Not Found</x-select-option>
                    <x-select-option class="text-center" wire:loading>Loading...</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('patternclass_id')" class="mt-1" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="faculty_id" :value="__('Select Faculty')" />
            <x-input-select id="faculty_id" wire:model.live="faculty_id" name="faculty_id" class="text-center w-full mt-1" :value="old('faculty_id', $faculty_id)" required autocomplete="faculty_id">
                <x-select-option class="text-start" hidden> -- Select Faculty -- </x-select-option>
                @forelse ($faculties as $faculty)
                    <x-select-option wire:key="{{ $faculty->id }}" value="{{ $faculty->id }}" class="text-start"> {{ $faculty->faculty_name }} </x-select-option>
                @empty
                    <x-select-option class="text-start">Faculties Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('faculty_id')" class="mt-1" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="evaluationdate" :value="__('Evaluation Date')" />
            <x-text-input id="evaluationdate" type="date" wire:model="evaluationdate" name="evaluationdate" class="w-full mt-1" :value="old('evaluationdate', $evaluationdate)" autocomplete="evaluationdate" />
            <x-input-error :messages="$errors->get('evaluationdate')" class="mt-1" />
        </div>
    </div>
    <x-form-btn>Submit</x-form-btn>
</div>
