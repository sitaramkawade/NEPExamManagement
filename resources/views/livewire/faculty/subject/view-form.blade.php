<x-card-collapsible heading="Subject Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_name" :value="__('Subject Name')" />
            @if ($isDisabled)
                <x-text-input id="subject_name" type="text" :value="$subject_name" disabled class="bg-gray-100 cursor-not-allowed @error('subject_name') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_name')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_sem" :value="__('Semester')" />
            @unless ($isDisabled)
                <x-text-input id="subject_sem" type="text" wire:model="subject_sem" name="subject_sem" class="@error('subject_sem') is-invalid @enderror w-full mt-1" :value="$subject_sem" required />
            @else
                <x-text-input id="subject_sem" type="text" :value="$subject_sem" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="subject_sem" />
            @endunless
            <x-input-error :messages="$errors->get('subject_sem')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectcategory_id" :value="__('Subject Category')" />
            @unless ($isDisabled)
                <x-text-input id="subjectcategory_id" type="text" wire:model="subjectcategory_id" name="subjectcategory_id" class="@error('subjectcategory_id') is-invalid @enderror w-full mt-1" :value="$subjectcategory_id->subjectcategory" required />
            @else
                <x-text-input id="subjectcategory_id" type="text" :value="$subjectcategory_id->subjectcategory" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="subjectcategory_id" />
            @endunless
            <x-input-error :messages="$errors->get('subjectcategory_id')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_no" :value="__('Subject Number')" />
            @if ($isDisabled)
                <x-text-input id="subject_no" type="text" :value="$subject_no" disabled class="bg-gray-100 cursor-not-allowed @error('subject_no') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_no')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_code" :value="__('Subject Code')" />
            @if ($isDisabled)
                <x-text-input id="subject_code" type="text" :value="$subject_code" disabled class="bg-gray-100 cursor-not-allowed @error('subject_code') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_code')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_shortname" :value="__('Subject Shortname')" />
            @if ($isDisabled)
                <x-text-input id="subject_shortname" type="text" :value="$subject_shortname" disabled class="bg-gray-100 cursor-not-allowed @error('subject_shortname') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('subject_shortname')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjecttype_id " :value="__('Subject Type')" />
            @unless ($isDisabled)
                <x-text-input id="subjecttype_id" type="text" wire:model="subjecttype_id" name="subjecttype_id" class="@error('subjecttype_id') is-invalid @enderror w-full mt-1" :value="$subjecttype_id->type_name" required />
            @else
                <x-text-input id="subjecttype_id" type="text" :value="$subjecttype_id->type_name" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="subjecttype_id" />
            @endunless
            <x-input-error :messages="$errors->get('subjecttype_id')" class="mt-2" />
        </div>
        {{-- remaining --}}
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectexam_type" :value="__('Subjectexam Type')" />
            <x-input-select id="subjectexam_type" wire:model="subjectexam_type" name="subjectexam_type" class="text-center @error('subjectexam_type') is-invalid @enderror w-full mt-1" :value="old('subjectexam_type', $subjectexam_type)" required autofocus autocomplete="subjectexam_type">
                <x-select-option class="text-start" hidden> -- Select Subject Exam Type -- </x-select-option>
                <x-select-option class="text-start" value="INTERNAL">Internal</x-select-option>
                <x-select-option class="text-start" value="EXTERNAL">External</x-select-option>
            </x-input-select>
            <x-input-error :messages="$errors->get('subjectexam_type')" class="mt-2" />
        </div>
        {{-- remaining --}}
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_credit" :value="__('Subject Credit')" />
            @unless ($isDisabled)
                <x-text-input id="subject_credit" type="text" wire:model="subject_credit" name="subject_credit" class="@error('subject_credit') is-invalid @enderror w-full mt-1" :value="$subject_credit" required />
            @else
                <x-text-input id="subject_credit" type="text" :value="$subject_credit" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="subject_credit" />
            @endunless
            <x-input-error :messages="$errors->get('subject_credit')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="classyear_id" :value="__('Select Class Year')" />
            @unless ($isDisabled)
                <x-text-input id="classyear_id" type="text" wire:model="classyear_id" name="classyear_id" class="@error('classyear_id') is-invalid @enderror w-full mt-1" :value="$classyear_id->classyear_name" required />
            @else
                <x-text-input id="classyear_id" type="text" :value="$classyear_id->classyear_name" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="classyear_id" />
            @endunless
            <x-input-error :messages="$errors->get('classyear_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="department_id" :value="__('Select Department')" />
            @unless ($isDisabled)
                <x-text-input id="department_id" type="text" wire:model="department_id" name="department_id" class="@error('department_id') is-invalid @enderror w-full mt-1" :value="$department_id->dept_name" required />
            @else
                <x-text-input id="department_id" type="text" :value="$department_id->dept_name" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="department_id" />
            @endunless
            <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="pattern_id" :value="__('Pattern')" />
            @unless ($isDisabled)
                <x-text-input id="pattern_id" type="text" wire:model="pattern_id" name="pattern_id" class="@error('pattern_id') is-invalid @enderror w-full mt-1" :value="$pattern_id->pattern_name" required />
            @else
                <x-text-input id="pattern_id" type="text" :value="$pattern_id->pattern_name" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="pattern_id" />
            @endunless
            <x-input-error :messages="$errors->get('pattern_id')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="course_id" :value="__('Course')" />
            @unless ($isDisabled)
                <x-text-input id="course_id" type="text" wire:model="course_id" name="course_id" class="@error('course_id') is-invalid @enderror w-full mt-1" :value="$course_id->course_name" required />
            @else
                <x-text-input id="course_id" type="text" :value="$course_id->course_name" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="course_id" />
            @endunless
            <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="course_class_id" :value="__('Class')" _class />
            @unless ($isDisabled)
                <x-text-input id="course_class_id" type="text" wire:model="course_class_id" name="course_class_id" class="@error('course_class_id') is-invalid @enderror w-full mt-1" :value="$classyear_id->classyear_name" required />
            @else
                <x-text-input id="course_class_id" type="text" :value="$classyear_id->classyear_name" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="course_class_id" />
            @endunless
            <x-input-error :messages="$errors->get('course_class_id')" class="mt-2" />
        </div>
        {{-- remaining --}}
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
        {{-- remaining --}}
    </div>

    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="college_id" :value="__('Select College')" />
            @unless ($isDisabled)
                <x-text-input id="college_id" type="text" wire:model="college_id" name="college_id" class="@error('college_id') is-invalid @enderror w-full mt-1" :value="$college_id->college_name" required />
            @else
                <x-text-input id="college_id" type="text" :value="$college_id->college_name" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="college_id" />
            @endunless
            <x-input-error :messages="$errors->get('college_id')" class="mt-2" />
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
    <div class="grid grid-cols-1 md:grid-cols-3">
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
