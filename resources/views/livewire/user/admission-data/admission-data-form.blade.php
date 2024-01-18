<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
  <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
    Admission Data Entry
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3">
    <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="user_id" :value="__('Select User')" />
      <x-input-select id="user_id" wire:model="user_id" name="user_id" class="text-center w-full mt-1" :value="old('user_id', $user_id)" required autocomplete="user_id">
        <x-select-option class="text-start" hidden> -- Select User -- </x-select-option>
        @forelse ($users as $user)
          <x-select-option wire:key="{{ $user->id }}" value="{{ $user->id }}" class="text-start"> {{ $user->name }} </x-select-option>
        @empty
          <x-select-option class="text-start">Users Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('user_id')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="patternclass_id" :value="__('Select Pattern Class')" />
      <x-input-select id="patternclass_id" wire:model="patternclass_id" name="patternclass_id" class="text-center w-full mt-1" :value="old('patternclass_id', $patternclass_id)" required autocomplete="patternclass_id">
        <x-select-option class="text-start" hidden> -- Select Pattern Classes -- </x-select-option>
        @forelse ($pattern_classes as $pattern_calss)
          <x-select-option wire:key="{{ $pattern_calss->id }}" value="{{ $pattern_calss->id }}" class="text-start"> {{ $pattern_calss->pattern->pattern_name ?? '-' }} {{ $pattern_calss->courseclass->classyear->classyear_name ?? '-' }} {{ $pattern_calss->courseclass->course->course_name ?? '-' }} </x-select-option>
        @empty
          <x-select-option class="text-start">Pattern Classes Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('patternclass_id')" class="mt-1" />
    </div>
    <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="subject_id" :value="__('Select Subject')" />
      <x-input-select id="subject_id" wire:model="subject_id" name="subject_id" class="text-center w-full mt-1" :value="old('subject_id', $subject_id)" required autocomplete="subject_id">
        <x-select-option class="text-start" hidden> -- Select Subject -- </x-select-option>
        @forelse ($subjects as $subject)
          <x-select-option wire:key="{{ $subject->id }}" value="{{ $subject->id }}" class="text-start"> {{ $subject->subject_name }} </x-select-option>
        @empty
          <x-select-option class="text-start">Subjects Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('subject_id')" class="mt-1" />
    </div>
    <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="academicyear_id" :value="__('Select Academic Year')" />
      <x-input-select id="academicyear_id" wire:model="academicyear_id" name="academicyear_id" class="text-center w-full mt-1" :value="old('academicyear_id', $academicyear_id)" required autocomplete="academicyear_id">
        <x-select-option class="text-start" hidden> -- Select Academic Year -- </x-select-option>
        @forelse ($academic_years as $academic_year)
          <x-select-option wire:key="{{ $academic_year->id }}" value="{{ $academic_year->id }}" class="text-start"> {{ $academic_year->year_name }} </x-select-option>
        @empty
          <x-select-option class="text-start">Academic Years Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('academicyear_id')" class="mt-1" />
    </div>
    <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="department_id" :value="__('Select Department')" />
      <x-input-select id="department_id" wire:model="department_id" name="department_id" class="text-center w-full mt-1" :value="old('department_id', $department_id)" required autocomplete="department_id">
        <x-select-option class="text-start" hidden> -- Select Department -- </x-select-option>
        @forelse ($departments as $departmnet)
          <x-select-option wire:key="{{ $departmnet->id }}" value="{{ $departmnet->id }}" class="text-start"> {{ $departmnet->dept_name }} </x-select-option>
        @empty
          <x-select-option class="text-start">Departments Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('department_id')" class="mt-1" />
    </div>
    <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="department_id" :value="__('Select College')" />
      <x-input-select id="college_id" wire:model="college_id" name="college_id" class="text-center w-full mt-1" :value="old('college_id', $college_id)"  autocomplete="college_id">
        <x-select-option class="text-start" hidden> -- Select College -- </x-select-option>
        @forelse ($colleges as $college)
          <x-select-option wire:key="{{ $college->id }}" value="{{ $college->id }}" class="text-start"> {{ $college->college_name }} </x-select-option>
        @empty
          <x-select-option class="text-start">Colleges Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('college_id')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="subject_code" :value="__('Subject Code')" />
      <x-text-input id="subject_code" type="text" wire:model="subject_code" placeholder="{{ __('Enter Subject Code') }}" name="subject_code" class="w-full mt-1" :value="old('subject_code', $subject_code)" autocomplete="subject_code" />
      <x-input-error :messages="$errors->get('subject_code')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="memid" :value="__('Member ID')" />
      <x-text-input id="memid" type="number" wire:model="memid" placeholder="{{ __('Enter Member ID') }}" name="memid" class="w-full mt-1" :value="old('memid', $memid)" autocomplete="memid" />
      <x-input-error :messages="$errors->get('memid')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="stud_name" :value="__('Student Name')" />
      <x-text-input id="stud_name" type="text" wire:model="stud_name" placeholder="{{ __('Enter Student Name') }}" name="stud_name" class="w-full mt-1" :value="old('stud_name', $stud_name)" autocomplete="stud_name" />
      <x-input-error :messages="$errors->get('stud_name')" class="mt-1" />
    </div>
  </div>
  <x-form-btn wire:loading.attr="disabled">Submit</x-form-btn>
</div>
