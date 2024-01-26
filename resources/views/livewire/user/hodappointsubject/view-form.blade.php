<x-card-collapsible heading="Hod Appointment Details">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="faculty_id" :value="__('Faculty Name')" />
            @if ($isDisabled)
                <x-text-input id="faculty_id" type="text" :value="$faculty_id" disabled class="bg-gray-100 cursor-not-allowed @error('faculty_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="pattern_id" :value="__('Pattern')" />
            @if ($isDisabled)
                <x-text-input id="pattern_id" type="text" :value="$pattern_id" disabled class="bg-gray-100 cursor-not-allowed @error('pattern_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="course_id" :value="__('Course')" />
            @if ($isDisabled)
                <x-text-input id="course_id" type="text" :value="$course_id" disabled class="bg-gray-100 cursor-not-allowed @error('course_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="course_class_id" :value="__('Course Class')" />
            @if ($isDisabled)
                <x-text-input id="course_class_id" type="text" :value="$course_class_id . ' ' . $course_id" disabled class="bg-gray-100 cursor-not-allowed @error('course_class_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="courseclass_subject_id" :value="__('Subject Name')" />
            @if ($isDisabled)
                <x-text-input id="courseclass_subject_id" type="text" :value="$courseclass_subject_id" disabled class="bg-gray-100 cursor-not-allowed @error('courseclass_subject_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</x-card-collapsible>
