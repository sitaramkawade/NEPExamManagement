<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
  <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
    Exam Fee Course
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3">
    <div class="px-5 col-span-2 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="patternclass_id" :value="__('Select Pattern Class')" />
      <x-input-select id="patternclass_id" wire:model.live="patternclass_id" name="patternclass_id" class="text-center w-full mt-1" :value="old('patternclass_id', $patternclass_id)" required autocomplete="patternclass_id">
        <x-select-option class="text-start" hidden> -- Select Pattern Classes -- </x-select-option>
        @forelse ($patternclasses as $pattern_calss)
          <x-select-option wire:key="{{ $pattern_calss->id }}" value="{{ $pattern_calss->id }}" class="text-start"> {{ $pattern_calss->pattern->pattern_name ?? '-' }} {{ $pattern_calss->courseclass->classyear->classyear_name ?? '-' }} {{ $pattern_calss->courseclass->course->course_name ?? '-' }} </x-select-option>
        @empty
          <x-select-option class="text-start">Pattern Classes Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('patternclass_id')" class="mt-1" />
    </div>
    <div class="px-5  py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="sem" :value="__('Select Semester')" />
      <x-input-select id="sem" wire:model.live="sem" name="sem" class="text-center w-full mt-1" :value="old('sem', $sem)" required autocomplete="sem">
        <x-select-option class="text-start" hidden> -- Select Semester -- </x-select-option>
        @forelse ($semesters as $semester)
          <x-select-option wire:key="{{ $semester->id }}" value="{{ $semester->semester }}" class="text-start"> {{ $semester->semester ?? '-' }} </x-select-option>
        @empty
          <x-select-option class="text-start"> Semesters Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('sem')" class="mt-1" />
    </div>
  </div>
  @forelse ($examfees as $exam_fee)
    <div class="grid grid-cols-1 md:grid-cols-6">
      <div class="px-5 col-span-2 py-2 text-sm text-gray-600 dark:text-gray-400">
        <x-input-show :value="$exam_fee->fee_type" />
      </div>
      <div class="px-5 col-span-2 py-2 text-sm text-gray-600 dark:text-gray-400">
        <x-text-input id="fees.{{ $exam_fee->id }}" type="number" name="fees.{{ $exam_fee->id }}"  wire:model="fees.{{ $exam_fee->id }}" placeholder="{{ __('Enter '.$exam_fee->fee_type.' Fee') }}"  class="w-full mt-1" :value="old('fees.{{ $exam_fee->id }}')"/>
          @error("fees.{$exam_fee->id}")
            <div class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</div>
          @enderror
      </div>
      <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
        <x-input-checkbox id="active_status.{{ $exam_fee->id }}" wire:model="active_status.{{ $exam_fee->id }}" name="active_status.{{ $exam_fee->id }}" :value="old('active_status.{{ $exam_fee->id }}')" />
        <x-input-label for="active_status.{{ $exam_fee->id }}" class="inline mb-1 mx-2" :value="__('Make In Active')" />
          @error("active_status.{$exam_fee->id}")
          <div class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</div>
        @enderror
      </div>
    </div>
  @endforeach

  <x-form-btn wire:loading.attr="disabled">Submit</x-form-btn>
</div>
