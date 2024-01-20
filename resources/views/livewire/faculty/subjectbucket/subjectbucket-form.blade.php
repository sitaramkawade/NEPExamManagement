<x-card-collapsible heading="Subjectbucket Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_categoryno" :value="__('Subject Category Number')" />
            <x-text-input id="subject_categoryno" type="number" wire:model="subject_categoryno" name="subject_categoryno" placeholder="Subject Category Number" class=" @error('subject_categoryno') is-invalid @enderror w-full mt-1" :value="old('subject_categoryno', $subject_categoryno)" required autofocus autocomplete="subject_categoryno" />
            <x-input-error :messages="$errors->get('subject_categoryno')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_division" :value="__('Subject Division')" />
            <x-input-select id="subject_division" wire:model="subject_division" name="subject_division" class="text-center @error('subject_division') is-invalid @enderror w-full mt-1" :value="old('subject_division', $subject_division)" required autofocus autocomplete="subject_division">
                <x-select-option class="text-start" hidden> -- Select Subject Division -- </x-select-option>
                <x-select-option class="text-start" value="A">A</x-select-option>
                <x-select-option class="text-start" value="B">B</x-select-option>
                <x-select-option class="text-start" value="C">C</x-select-option>
                <x-select-option class="text-start" value="D">D</x-select-option>
            </x-input-select>
            <x-input-error :messages="$errors->get('subject_division')" class="mt-2" />
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
            <x-input-label for="subjectcategory_id" :value="__('Subject Category')" />
            <x-input-select id="subjectcategory_id" wire:model="subjectcategory_id" name="subjectcategory_id" class="text-center @error('subjectcategory_id') is-invalid @enderror w-full mt-1" :value="old('subjectcategory_id', $subjectcategory_id)" required autofocus autocomplete="subjectcategory_id">
                <x-select-option class="text-start" hidden> -- Select Subject Category -- </x-select-option>
                @foreach ($subject_categories as $subject_category)
                    <x-select-option wire:key="{{ $subject_category->id }}" value="{{ $subject_category->id }}" class="text-start">{{ $subject_category->subjectcategory }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('subjectcategory_id')" class="mt-2" />
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
            <x-input-label for="subject_id" :value="__('Subject')" />
            <x-input-select id="subject_id" wire:model="subject_id" name="subject_id" class="text-center @error('subject_id') is-invalid @enderror w-full mt-1" :value="old('subject_id', $subject_id)" required autofocus autocomplete="subject_id">
                <x-select-option class="text-start" hidden> -- Select Subject -- </x-select-option>
                @foreach ($subjects as $subject)
                    <x-select-option wire:key="{{ $subject->id }}" value="{{ $subject->id }}" class="text-start">{{ $subject->subject_name }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('subject_id')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="academicyear_id" :value="__('Academic Year')" />
            <x-input-select id="academicyear_id" wire:model="academicyear_id" name="academicyear_id" class="text-center @error('academicyear_id') is-invalid @enderror w-full mt-1" :value="old('academicyear_id', $academicyear_id)" required autofocus autocomplete="academicyear_id">
                <x-select-option class="text-start" hidden> -- Select Academic Year -- </x-select-option>
                @foreach ($academic_years as $academic_year)
                    <x-select-option wire:key="{{ $academic_year->id }}" value="{{ $academic_year->id }}" class="text-start">{{ $academic_year->year_name }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('academicyear_id')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="status" :value="__('Status')" />
            <x-input-select id="status" wire:model="status" name="status" class="text-center @error('status') is-invalid @enderror w-full mt-1" :value="old('status', $status)" required autofocus autocomplete="status">
                <x-select-option class="text-start" hidden> -- Select Status -- </x-select-option>
                <x-select-option class="text-start" value=0>Inactive</x-select-option>
                <x-select-option class="text-start" value=1>Active</x-select-option>
            </x-input-select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>
    </div>
    <x-form-btn>Submit</x-form-btn>
</x-card-collapsible>
