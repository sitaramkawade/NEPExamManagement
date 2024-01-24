<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
  <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
    Exam Backlog Fee Course
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2">
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="backlogfee" :value="__('Backlog Fee')" />
      <x-text-input id="backlogfee" type="number" wire:model="backlogfee" placeholder="{{ __('Enter Backlog Fee') }}" name="backlogfee" class="w-full mt-1" :value="old('backlogfee', $backlogfee)" autocomplete="backlogfee" />
      <x-input-error :messages="$errors->get('backlogfee')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="sem" :value="__('Select Semester')" />
      <x-input-select id="sem" wire:model="sem" name="sem" class="text-center w-full mt-1" :value="old('sem', $sem)" required autocomplete="sem">
        <x-select-option class="text-start" hidden> -- Select Semester -- </x-select-option>
        @forelse ($semesters as $semester)
          <x-select-option wire:key="{{ $semester->id }}" value="{{ $semester->semester }}" class="text-start"> {{ $semester->semester ?? '-' }} </x-select-option>
        @empty
          <x-select-option class="text-start"> Semesters Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('sem')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="patternclass_id" :value="__('Select Pattern Class')" />
      <x-input-select id="patternclass_id" wire:model="patternclass_id" name="patternclass_id" class="text-center w-full mt-1" :value="old('patternclass_id', $patternclass_id)" required autocomplete="patternclass_id">
        <x-select-option class="text-start" hidden> -- Select Pattern Classes -- </x-select-option>
        @forelse ($patternclasses as $pattern_calss)
          <x-select-option wire:key="{{ $pattern_calss->id }}" value="{{ $pattern_calss->id }}" class="text-start"> {{ $pattern_calss->pattern->pattern_name ?? '-' }} {{ $pattern_calss->courseclass->classyear->classyear_name ?? '-' }} {{ $pattern_calss->courseclass->course->course_name ?? '-' }} </x-select-option>
        @empty
          <x-select-option class="text-start">Pattern Classes Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('patternclass_id')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="examfees_id" :value="__('Select Exam Fee Type')" />
      <x-input-select id="examfees_id" wire:model="examfees_id" name="examfees_id" class="text-center w-full mt-1" :value="old('examfees_id', $examfees_id)" required autocomplete="examfees_id">
        <x-select-option class="text-start" hidden> -- Select Exam Fee Type -- </x-select-option>
        @forelse ($examfees as $exam_fee)
          <x-select-option wire:key="{{ $exam_fee->id }}" value="{{ $exam_fee->id }}" class="text-start"> {{ $exam_fee->fee_type ?? '-' }} </x-select-option>
        @empty
          <x-select-option class="text-start"> Exam Fee Types Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('examfees_id')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="active_status" :value="__('Status')" /> <br>
      <x-input-checkbox id="active_status" wire:model="active_status" name="active_status" :value="old('active_status', $active_status)" />
      <x-input-label for="active_status" class="inline mb-1 mx-2" :value="__('Make In Active')" />
      <x-input-error :messages="$errors->get('active_status')" class="mt-2" />
    </div>
  </div>
  <x-form-btn wire:loading.attr="disabled">Submit</x-form-btn>
</div>
