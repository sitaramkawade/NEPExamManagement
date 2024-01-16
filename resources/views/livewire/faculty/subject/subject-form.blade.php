<x-card-collapsible heading="Subject Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_name" :value="__('Subject Name')" />
            <x-text-input id="subject_name" type="text" wire:model="subject_name" name="subject_name" placeholder="Subject Name" class=" @error('subject_name') is-invalid @enderror w-full mt-1" :value="old('subject_name', $subject_name)" required autofocus autocomplete="subject_name" />
            <x-input-error :messages="$errors->get('subject_name')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_sem" :value="__('Subject Semester')" />
            <x-input-select id="subject_sem" wire:model="subject_sem" name="subject_sem" class="text-center @error('subject_sem') is-invalid @enderror w-full mt-1" :value="old('subject_sem', $subject_sem)" required autofocus autocomplete="subject_sem">
                <x-select-option class="text-start" hidden> -- Select Subject Semester -- </x-select-option>
                @foreach ($semesters as $semester)
                    <x-select-option wire:key="{{ $semester->id }}" value="{{ $semester->id }}" class="text-start">{{ $semester->semester }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('subject_sem')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectcategory_id" :value="__('Subject Category')" />
            <x-input-select id="subjectcategory_id" wire:model="subjectcategory_id" name="subjectcategory_id" class="text-center @error('subjectcategory_id') is-invalid @enderror w-full mt-1" :value="old('subjectcategory_id', $subjectcategory_id)" required autofocus autocomplete="subjectcategory_id">
                <x-select-option class="text-start" hidden> -- Select Subject Category -- </x-select-option>
                @foreach ($subject_categories as $subject_category)
                    <x-select-option wire:key="{{ $subject_category->id }}" value="{{ $subject_category->id }}" class="text-start">{{ $subject_category->subjectcategory }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('subjectcategory_id')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_no" :value="__('Subject Number')" />
            <x-text-input id="subject_no" type="number" wire:model="subject_no" name="subject_no" placeholder="Subject Number" class=" @error('subject_no') is-invalid @enderror w-full mt-1" :value="old('subject_no', $subject_no)" required autofocus autocomplete="subject_no" />
            <x-input-error :messages="$errors->get('subject_no')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_code" :value="__('Subject Code')" />
            <x-text-input id="subject_code" type="number" wire:model="subject_code" name="subject_code" placeholder="Subject Code" class=" @error('subject_code') is-invalid @enderror w-full mt-1" :value="old('subject_code', $subject_code)" required autofocus autocomplete="subject_code" />
            <x-input-error :messages="$errors->get('subject_code')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_shortname" :value="__('Subject Shortname')" />
            <x-text-input id="subject_shortname" type="text" wire:model="subject_shortname" name="subject_shortname" placeholder="Subject Shortname" class=" @error('subject_shortname') is-invalid @enderror w-full mt-1" :value="old('subject_shortname', $subject_shortname)" required autofocus autocomplete="subject_shortname" />
            <x-input-error :messages="$errors->get('subject_shortname')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjecttype_id " :value="__('Subject Type')" />
            <x-input-select id="subjecttype_id" wire:model="subjecttype_id" name="subjecttype_id" class="text-center @error('subjecttype_id') is-invalid @enderror w-full mt-1" :value="old('subjecttype_id', $subjecttype_id)" required autofocus autocomplete="subjecttype_id">
                <x-select-option class="text-start" hidden> -- Select Subject Type -- </x-select-option>
                @foreach ($subject_types as $subject_type)
                    <x-select-option wire:key="{{ $subject_type->id }}" value="{{ $subject_type->id }}" class="text-start">{{ $subject_type->type_name }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('subjecttype_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectexam_type" :value="__('Subjectexam Type')" />
            <x-input-select id="subjectexam_type" wire:model="subjectexam_type" name="subjectexam_type" class="text-center @error('subjectexam_type') is-invalid @enderror w-full mt-1" :value="old('subjectexam_type', $subjectexam_type)" required autofocus autocomplete="subjectexam_type">
                <x-select-option class="text-start" hidden> -- Select Subject Exam Type -- </x-select-option>
                <x-select-option class="text-start" value="INTERNAL">Internal</x-select-option>
                <x-select-option class="text-start" value="EXTERNAL">External</x-select-option>
            </x-input-select>
            <x-input-error :messages="$errors->get('subjectexam_type')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_credit" :value="__('Subject Credit')" />
            <x-input-select id="subject_credit" wire:model="subject_credit" name="subject_credit" class="text-center @error('subject_credit') is-invalid @enderror w-full mt-1" :value="old('subject_credit', $subject_credit)" required autofocus autocomplete="subject_credit">
                <x-select-option class="text-start" hidden> -- Select Subject Credit -- </x-select-option>
                <x-select-option class="text-start" value="1">1</x-select-option>
                <x-select-option class="text-start" value="2">2</x-select-option>
                <x-select-option class="text-start" value="3">3</x-select-option>
                <x-select-option class="text-start" value="4">4</x-select-option>
            </x-input-select>
            <x-input-error :messages="$errors->get('subject_credit')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="classyear_id" :value="__('Select Class Year')" />
            <x-input-select id="classyear_id" wire:model="classyear_id" name="classyear_id" class="text-center @error('classyear_id') is-invalid @enderror w-full mt-1" :value="old('classyear_id', $classyear_id)" required autofocus autocomplete="classyear_id">
                <x-select-option class="text-start" hidden> -- Select Class Year -- </x-select-option>
                @foreach ($class_years as $class_year)
                    <x-select-option wire:key="{{ $class_year->id }}" value="{{ $class_year->id }}" class="text-start">{{ $class_year->classyear_name }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('classyear_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="department_id" :value="__('Select Department')" />
            <x-input-select id="department_id" wire:model="department_id" name="department_id" class="text-center @error('department_id') is-invalid @enderror w-full mt-1" :value="old('department_id', $department_id)" required autofocus autocomplete="department_id">
                <x-select-option class="text-start" hidden> -- Select Department -- </x-select-option>
                @foreach ($departments as $department)
                    <x-select-option wire:key="{{ $department->id }}" value="{{ $department->id }}" class="text-start">{{ $department->dept_name }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
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
                @forelse ($course_classes as $course_class)
                    <x-select-option wire:key="{{ $course_class->id }}" value="{{ $course_class->id }}" class="text-start"> {{ $course_class->classyear->classyear_name }} {{ $course_class->course->course_name ?? '' }} </x-select-option>
                @empty
                    <x-select-option class="text-start"> Classes Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('course_class_id')" class="mt-2" />
        </div>
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
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="college_id" :value="__('Select College')" />
            <x-input-select id="college_id" wire:model="college_id" name="college_id" class="text-center @error('college_id') is-invalid @enderror w-full mt-1" :value="old('college_id', $college_id)" required autofocus autocomplete="college_id">
                <x-select-option class="text-start" value="" hidden> -- Select College -- </x-select-option>
                @foreach ($colleges as $college)
                    <x-select-option wire:key="{{ $college->id }}" value="{{ $college->id }}" class="text-start">{{ $college->college_name }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('college_id')" class="mt-2" />
        </div>
    </div>
</x-card-collapsible>
<x-card-collapsible heading="Subject Marks Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_maxmarks" :value="__('Subject Maximum Marks')" />
            <x-text-input id="subject_maxmarks" type="number" wire:model="subject_maxmarks" name="subject_maxmarks" placeholder="Subject Maximum Marks" class=" @error('subject_maxmarks') is-invalid @enderror w-full mt-1" :value="old('subject_maxmarks', $subject_maxmarks)" required autofocus autocomplete="subject_maxmarks" />
            <x-input-error :messages="$errors->get('subject_maxmarks')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_maxmarks_int" :value="__('Subject Internal Maximum Marks')" />
            <x-text-input id="subject_maxmarks_int" type="number" wire:model="subject_maxmarks_int" name="subject_maxmarks_int" placeholder="Subject Maximum Marks" class=" @error('subject_maxmarks_int') is-invalid @enderror w-full mt-1" :value="old('subject_maxmarks_int', $subject_maxmarks_int)" required autofocus autocomplete="subject_maxmarks_int" />
            <x-input-error :messages="$errors->get('subject_maxmarks_int')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_maxmarks_intpract" :value="__('Subject Internal Practical Maximum Marks')" />
            <x-text-input id="subject_maxmarks_intpract" type="number" wire:model="subject_maxmarks_intpract" name="subject_maxmarks_intpract" placeholder="Subject Internal Practical Maximum Marks" class=" @error('subject_maxmarks_intpract') is-invalid @enderror w-full mt-1" :value="old('subject_maxmarks_intpract', $subject_maxmarks_intpract)" required autofocus autocomplete="subject_maxmarks_intpract" />
            <x-input-error :messages="$errors->get('subject_maxmarks_intpract')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_maxmarks_ext" :value="__('Subject External Maximum Marks')" />
            <x-text-input id="subject_maxmarks_ext" type="number" wire:model="subject_maxmarks_ext" name="subject_maxmarks_ext" placeholder="Subject External Maximum Marks" class=" @error('subject_maxmarks_ext') is-invalid @enderror w-full mt-1" :value="old('subject_maxmarks_ext', $subject_maxmarks_ext)" required autofocus autocomplete="subject_maxmarks_ext" />
            <x-input-error :messages="$errors->get('subject_maxmarks_ext')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_totalpassing" :value="__('Subject Total Passing Marks')" />
            <x-text-input id="subject_totalpassing" type="number" wire:model="subject_totalpassing" name="subject_totalpassing" placeholder="Subject Total Passing Marks" class=" @error('subject_totalpassing') is-invalid @enderror w-full mt-1" :value="old('subject_totalpassing', $subject_totalpassing)" required autofocus autocomplete="subject_totalpassing" />
            <x-input-error :messages="$errors->get('subject_totalpassing')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_intpassing" :value="__('Subject Internal Passing Marks')" />
            <x-text-input id="subject_intpassing" type="number" wire:model="subject_intpassing" name="subject_intpassing" placeholder="Subject Internal Passing Marks" class=" @error('subject_intpassing') is-invalid @enderror w-full mt-1" :value="old('subject_intpassing', $subject_intpassing)" required autofocus autocomplete="subject_intpassing" />
            <x-input-error :messages="$errors->get('subject_intpassing')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_intpractpassing" :value="__('Subject Internal Practical Passing Marks')" />
            <x-text-input id="subject_intpractpassing" type="number" wire:model="subject_intpractpassing" name="subject_intpractpassing" placeholder="Subject Internal Practical Passing Marks" class=" @error('subject_intpractpassing') is-invalid @enderror w-full mt-1" :value="old('subject_intpractpassing', $subject_intpractpassing)" required autofocus autocomplete="subject_intpractpassing" />
            <x-input-error :messages="$errors->get('subject_intpractpassing')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_extpassing" :value="__('Subject External Passing Marks')" />
            <x-text-input id="subject_extpassing" type="number" wire:model="subject_extpassing" name="subject_extpassing" placeholder="Subject Internal Practical Passing Marks" class=" @error('subject_extpassing') is-invalid @enderror w-full mt-1" :value="old('subject_extpassing', $subject_extpassing)" required autofocus autocomplete="subject_extpassing" />
            <x-input-error :messages="$errors->get('subject_extpassing')" class="mt-2" />
        </div>
    </div>
    <x-form-btn>Submit</x-form-btn>
</x-card-collapsible>
