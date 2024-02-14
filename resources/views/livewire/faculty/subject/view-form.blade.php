<x-card-collapsible heading="Subject Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="pattern_id" :value="__('Pattern')" />
            @if ($isDisabled)
                <x-text-input id="pattern_id" type="text" :value="$pattern_id" disabled class="bg-gray-100 cursor-not-allowed @error('pattern_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="patternclass_id" :value="__('Pattern Class')" />
            @if ($isDisabled)
                <x-text-input id="patternclass_id" type="text" :value="$patternclass_id" disabled class="bg-gray-100 cursor-not-allowed @error('patternclass_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectcategory_id" :value="__('Subject Category')" />
            @if ($isDisabled)
                <x-text-input id="subjectcategory_id" type="text" :value="$subjectcategory_id" disabled class="bg-gray-100 cursor-not-allowed @error('subjectcategory_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_name_prefix" :value="__('Subject Name Prefix')" />
            @if ($isDisabled)
                <x-text-input id="subject_name_prefix" type="text" :value="$subject_name_prefix" disabled class="bg-gray-100 cursor-not-allowed @error('subject_name_prefix') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_sem" :value="__('Subject Semester')" />
            @if ($isDisabled)
                <x-text-input id="subject_sem" type="text" :value="$subject_sem" disabled class="bg-gray-100 cursor-not-allowed @error('subject_sem') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_name" :value="__('Subject Name')" />
            @if ($isDisabled)
                <x-text-input id="subject_name" type="text" :value="$subject_name" disabled class="bg-gray-100 cursor-not-allowed @error('subject_name') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
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
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_credit" :value="__('Subject Credit')" />
            @if ($isDisabled)
                <x-text-input id="subject_credit" type="text" :value="$subject_credit" disabled class="bg-gray-100 cursor-not-allowed @error('subject_credit') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="classyear_id" :value="__('Class Year')" />
            @if ($isDisabled)
                <x-text-input id="classyear_id" type="text" :value="$classyear_id" disabled class="bg-gray-100 cursor-not-allowed @error('classyear_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="is_panel" :value="__('Exam Panel')" />
            @if ($isDisabled)
                <x-text-input id="is_panel" type="text" :value="$is_panel == 1 ? 'YES' : 'NO'" disabled class="bg-gray-100 cursor-not-allowed @error('is_panel') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="no_of_sets" :value="__('No Of Sets')" />
            @if ($isDisabled)
                <x-text-input id="no_of_sets" type="text" :value="$no_of_sets" disabled class="bg-gray-100 cursor-not-allowed @error('no_of_sets') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_order" :value="__('Subject Order')" />
            @if ($isDisabled)
                <x-text-input id="subject_order" type="text" :value="$subject_order" disabled class="bg-gray-100 cursor-not-allowed @error('subject_order') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</x-card-collapsible>

@if ($type['IE'])
    <x-card-collapsible heading="Subject Marks Details">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks" :value="__('Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks" type="text" :value="$subject_maxmarks" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_int" :value="__('Internal Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_int" type="text" :value="$subject_maxmarks_int" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_int') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_ext" :value="__('External Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_ext" type="text" :value="$subject_maxmarks_ext" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_ext') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_totalpassing" :value="__('Total Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_totalpassing" type="text" :value="$subject_totalpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_totalpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_intpassing" :value="__('Internal Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_intpassing" type="text" :value="$subject_intpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_intpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_extpassing" :value="__('External Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_extpassing" type="text" :value="$subject_extpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_extpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
    </x-card-collapsible>
@elseif ($type['IP'])
    <x-card-collapsible heading="Subject Marks Details">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks" :value="__('Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks" type="text" :value="$subject_maxmarks" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_int" :value="__('Internal Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_int" type="text" :value="$subject_maxmarks_int" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_int') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_intpract" :value="__('Internal Practical Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_intpract" type="text" :value="$subject_maxmarks_intpract" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_intpract') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_intpractpassing" :value="__('Internal Practical Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_intpractpassing" type="text" :value="$subject_intpractpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_intpractpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_intpassing" :value="__('Internal Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_intpassing" type="text" :value="$subject_intpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_intpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_totalpassing" :value="__('Total Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_totalpassing" type="text" :value="$subject_totalpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_totalpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
    </x-card-collapsible>
@elseif ($type['IG'])
    <x-card-collapsible heading="Subject Marks Details">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks" :value="__('Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks" type="text" :value="$subject_maxmarks" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_int" :value="__('Internal Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_int" type="text" :value="$subject_maxmarks_int" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_int') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_intpassing" :value="__('Internal Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_intpassing" type="text" :value="$subject_intpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_intpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_totalpassing" :value="__('Total Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_totalpassing" type="text" :value="$subject_totalpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_totalpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
    </x-card-collapsible>
@elseif ($type['I'])
    <x-card-collapsible heading="Subject Marks Details">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks" :value="__('Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks" type="text" :value="$subject_maxmarks" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_int" :value="__('Internal Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_int" type="text" :value="$subject_maxmarks_int" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_int') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_intpassing" :value="__('Internal Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_intpassing" type="text" :value="$subject_intpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_intpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_totalpassing" :value="__('Total Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_totalpassing" type="text" :value="$subject_totalpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_totalpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
    </x-card-collapsible>
@elseif ($type['P'])

@elseif ($type['G'])

@elseif ($type['IEP'])
    <x-card-collapsible heading="Subject Marks Details">
        <div class="grid grid-cols-1 md:grid-cols-4">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks" :value="__('Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks" type="text" :value="$subject_maxmarks" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_int" :value="__('Internal Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_int" type="text" :value="$subject_maxmarks_int" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_int') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_intpract" :value="__('Internal Practical Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_intpract" type="text" :value="$subject_maxmarks_intpract" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_intpract') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_ext" :value="__('External Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_ext" type="text" :value="$subject_maxmarks_ext" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_ext') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_totalpassing" :value="__('Total Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_totalpassing" type="text" :value="$subject_totalpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_totalpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_intpassing" :value="__('Internal Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_intpassing" type="text" :value="$subject_intpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_intpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_intpractpassing" :value="__('Internal Practical Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_intpractpassing" type="text" :value="$subject_intpractpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_intpractpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_extpassing" :value="__('External Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_extpassing" type="text" :value="$subject_extpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_extpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
    </x-card-collapsible>
@elseif ($type['IEG'])
    <x-card-collapsible heading="Subject Marks Details">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks" :value="__('Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks" type="text" :value="$subject_maxmarks" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_int" :value="__('Internal Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_int" type="text" :value="$subject_maxmarks_int" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_int') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_maxmarks_ext" :value="__('External Maximum Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_maxmarks_ext" type="text" :value="$subject_maxmarks_ext" disabled class="bg-gray-100 cursor-not-allowed @error('subject_maxmarks_ext') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_intpassing" :value="__('Internal Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_intpassing" type="text" :value="$subject_intpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_intpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_extpassing" :value="__('External Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_extpassing" type="text" :value="$subject_extpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_extpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="subject_totalpassing" :value="__('Total Passing Marks')" />
                @if ($isDisabled)
                    <x-text-input id="subject_totalpassing" type="text" :value="$subject_totalpassing" disabled class="bg-gray-100 cursor-not-allowed @error('subject_totalpassing') is-invalid @enderror w-full mt-1" />
                @endif
            </div>
        </div>
    </x-card-collapsible>
@elseif ($type['E'])
@endif
