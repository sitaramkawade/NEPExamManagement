<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Subject Bucket Detail's
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_id" :value="__('Subject Name')" />
            @if ($isDisabled)
                <x-text-input id="subject_id" type="text" :value="$subject_id" disabled class="bg-gray-100 cursor-not-allowed @error('subject_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_division" :value="__('Subject Division')" />
            @if ($isDisabled)
                <x-text-input id="subject_division" type="text" :value="$subject_division" disabled class="bg-gray-100 cursor-not-allowed @error('subject_division') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="department_id" :value="__('Department')" />
            @if ($isDisabled)
                <x-text-input id="department_id" type="text" :value="$department_id" disabled class="bg-gray-100 cursor-not-allowed @error('department_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectcategory_id" :value="__('Subject Category')" />
            @if ($isDisabled)
                <x-text-input id="subjectcategory_id" type="text" :value="$subjectcategory_id" disabled class="bg-gray-100 cursor-not-allowed @error('subjectcategory_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="pattern_id" :value="__('Pattern')" />
            @if ($isDisabled)
                <x-text-input id="pattern_id" type="text" :value="$pattern_id" disabled class="bg-gray-100 cursor-not-allowed @error('pattern_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="course_id" :value="__('Course')" />
            @if ($isDisabled)
                <x-text-input id="course_id" type="text" :value="$course_id" disabled class="bg-gray-100 cursor-not-allowed @error('course_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="course_class_id" :value="__('Course Class')" />
            @if ($isDisabled)
                <x-text-input id="course_class_id" type="text" :value="$course_class_id" disabled class="bg-gray-100 cursor-not-allowed @error('course_class_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="academicyear_id" :value="__('Academic Year')" />
            @if ($isDisabled)
                <x-text-input id="academicyear_id" type="text" :value="$academicyear_id" disabled class="bg-gray-100 cursor-not-allowed @error('academicyear_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</div>
