<x-card-collapsible heading="Subject Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_name" :value="__('Subject Name')" />
            @if ($isDisabled)
                <x-text-input id="subject_name" type="text" :value="$subject_name" disabled class="bg-gray-100 cursor-not-allowed @error('subject_name') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_sem" :value="__('Semester')" />
            @if ($isDisabled)
                <x-text-input id="subject_sem" type="text" :value="$subject_sem" disabled class="bg-gray-100 cursor-not-allowed @error('subject_sem') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectcategory_id" :value="__('Subject Category')" />
            @if ($isDisabled)
                <x-text-input id="subjectcategory_id" type="text" :value="$subjectcategory_id" disabled class="bg-gray-100 cursor-not-allowed @error('subjectcategory_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">

        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_code" :value="__('Subject Code')" />
            @if ($isDisabled)
                <x-text-input id="subject_code" type="text" :value="$subject_code" disabled class="bg-gray-100 cursor-not-allowed @error('subject_code') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjecttype_id " :value="__('Subject Type')" />
            @if ($isDisabled)
                <x-text-input id="subjecttype_id" type="text" :value="$subjecttype_id" disabled class="bg-gray-100 cursor-not-allowed @error('subjecttype_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectexam_type " :value="__('Subject Exam Type')" />
            @if ($isDisabled)
                <x-text-input id="subjectexam_type" type="text" :value="$subjectexam_type" disabled class="bg-gray-100 cursor-not-allowed @error('subjectexam_type') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_credit" :value="__('Subject Credit')" />
            @if ($isDisabled)
                <x-text-input id="subject_credit" type="text" :value="$subject_credit" disabled class="bg-gray-100 cursor-not-allowed @error('subject_credit') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="classyear_id" :value="__('Select Class Year')" />
            @if ($isDisabled)
                <x-text-input id="classyear_id" type="text" :value="$classyear_id" disabled class="bg-gray-100 cursor-not-allowed @error('classyear_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="department_id" :value="__('Select Department')" />
            @if ($isDisabled)
                <x-text-input id="department_id" type="text" :value="$department_id" disabled class="bg-gray-100 cursor-not-allowed @error('department_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
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
            <x-input-label for="course_class_id" :value="__('Class')" _class />
            @if ($isDisabled)
                <x-text-input id="course_class_id" type="text" :value="$course_class_id" disabled class="bg-gray-100 cursor-not-allowed @error('course_class_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
    {{-- <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_optionalgroup" :value="__('Subject Optional Group')" />
            <x-input-select id="subject_optionalgroup" wire:model="subject_optionalgroup" name="subject_optionalgroup" class="text-center @error('subject_optionalgroup') is-invalid @enderror w-full mt-1" :value="old('subject_optionalgroup', $subject_optionalgroup)" required autofocus autocomplete="subject_optionalgroup">
                <x-select-option class="text-start" hidden> -- Select Subject Optional Group -- </x-select-option>
                <x-select-option class="text-start" value="DSC">DSC</x-select-option>
                <x-select-option class="text-start" value="VSC">VSC</x-select-option>
                <x-select-option class="text-start" value="IKS">IKS</x-select-option>
                <x-select-option class="text-start" value="M">M</x-select-option>
                <x-select-option class="text-start" value="CC">CC</x-select-option>
                <x-select-option class="text-start" value="OE">OE</x-select-option>
                <x-select-option class="text-start" value="SEC">SEC</x-select-option>
                <x-select-option class="text-start" value="AEC">AEC</x-select-option>
                <x-select-option class="text-start" value="VEC">VEC</x-select-option>
            </x-input-select>
            <x-input-error :messages="$errors->get('subject_optionalgroup')" class="mt-2" />
        </div>
    </div> --}}
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="college_id" :value="__('Select College')" />
            @if ($isDisabled)
                <x-text-input id="college_id" type="text" :value="$college_id" disabled class="bg-gray-100 cursor-not-allowed @error('college_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</x-card-collapsible>
<x-card-collapsible heading="Subject Marks Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_maxmarks" :value="__('Subject Maximum Marks')" />
            @if ($isDisabled)
                <x-text-input id="subject_maxmarks" type="text" :value="$subject_maxmarks" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_maxmarks')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_maxmarks_int" :value="__('Subject Internal Maximum Marks')" />
            @if ($isDisabled)
                <x-text-input id="subject_maxmarks_int" type="text" :value="$subject_maxmarks_int" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_int') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_maxmarks_int')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_maxmarks_intpract" :value="__('Subject Internal Practical Maximum Marks')" />
            @if ($isDisabled)
                <x-text-input id="subject_maxmarks_intpract" type="text" :value="$subject_maxmarks_intpract" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_intpract') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_maxmarks_intpract')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_maxmarks_ext" :value="__('Subject External Maximum Marks')" />
            @if ($isDisabled)
                <x-text-input id="subject_maxmarks_ext" type="text" :value="$subject_maxmarks_ext" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_ext') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_maxmarks_ext')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_totalpassing" :value="__('Subject Total Passing Marks')" />
            @if ($isDisabled)
                <x-text-input id="subject_totalpassing" type="text" :value="$subject_totalpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_totalpassing') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_totalpassing')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_intpassing" :value="__('Subject Internal Passing Marks')" />
            @if ($isDisabled)
                <x-text-input id="subject_intpassing" type="text" :value="$subject_intpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_intpassing') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_intpassing')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_intpractpassing" :value="__('Subject Internal Practical Passing Marks')" />
            @if ($isDisabled)
                <x-text-input id="subject_intpractpassing" type="text" :value="$subject_intpractpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_intpractpassing') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_intpractpassing')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_extpassing" :value="__('Subject External Passing Marks')" />
            @if ($isDisabled)
                <x-text-input id="subject_extpassing" type="text" :value="$subject_extpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_extpassing') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_extpassing')" class="mt-2" />
        </div>
    </div>
</x-card-collapsible>
