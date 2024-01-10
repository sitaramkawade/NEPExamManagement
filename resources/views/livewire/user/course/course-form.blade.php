<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
  <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
    Course
  </div>
  <div class="grid grid-cols-1 md:grid-cols-5">
    <div class="px-5 py-2 col-span-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="college_id" :value="__('Selete College')" />
      <x-input-select id="college_id" wire:model.live="college_id" name="college_id" class="text-center w-full mt-1" :value="old('college_id', $college_id)" required autocomplete="college_id">
        <x-select-option class="text-start" hidden> -- Select College -- </x-select-option>
        @forelse ($colleges as $college)
          <x-select-option wire:key="{{ $college->id }}" value="{{ $college->id }}" class="text-start"> {{ $college->college_name }} </x-select-option>
        @empty
          <x-select-option class="text-start">Colleges Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('college_id')" class="mt-1" />
    </div>
    <div class="px-5 py-2  col-span-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="programme_id" :value="__('Selete Programme')" />
      <x-input-select id="programme_id" wire:model.live="programme_id" name="programme_id" class="text-center w-full mt-1" :value="old('programme_id', $programme_id)" required autocomplete="programme_id">
        <x-select-option class="text-start" hidden> -- Select Programme -- </x-select-option>
        @forelse ($programmes as $programme)
          <x-select-option wire:key="{{ $programme->id }}" value="{{ $programme->id }}" class="text-start"> {{ $programme->programme_name }} </x-select-option>
        @empty
          <x-select-option class="text-start">Programmes Not Found</x-select-option>
        @endforelse
      </x-input-select>
      <x-input-error :messages="$errors->get('programme_id')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="course_code" :value="__('Course Code')" />
      <x-text-input id="course_code" type="text" wire:model="course_code" placeholder="{{ __('Enter Course Code') }}" name="course_code" class="w-full mt-1" :value="old('course_code', $course_code)" autocomplete="course_code" />
      <x-input-error :messages="$errors->get('course_code')" class="mt-1" />
    </div>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2">
    <div class="px-5 py-2 colspan-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="course_name" :value="__('Course Name')" />
      <x-text-input id="course_name" type="text" wire:model="course_name" placeholder="{{ __('Enter Course Name') }}" name="course_name" class="w-full mt-1" :value="old('course_name', $course_name)" autocomplete="course_name" />
      <x-input-error :messages="$errors->get('course_name')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="fullname" :value="__('Full Name')" />
      <x-text-input id="fullname" type="text" wire:model="fullname" placeholder="{{ __('Enter Full Name') }}" name="fullname" class="w-full mt-1" :value="old('fullname', $fullname)" autocomplete="fullname" />
      <x-input-error :messages="$errors->get('fullname')" class="mt-1" />
    </div>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2">
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="shortname" :value="__('Short Name')" />
      <x-text-input id="shortname" type="text" wire:model="shortname" placeholder="{{ __('Enter Short Name') }}" name="shortname" class="w-full mt-1" :value="old('shortname', $shortname)" autocomplete="shortname" />
      <x-input-error :messages="$errors->get('shortname')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="special_subject" :value="__('Special Subject')" />
      <x-text-input id="special_subject" type="text" wire:model="special_subject" placeholder="{{ __('Special Subject') }}" name="special_subject" class="w-full mt-1" :value="old('special_subject', $special_subject)" autocomplete="special_subject" />
      <x-input-error :messages="$errors->get('special_subject')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="course_type" :value="__('Course Type')" />
      <x-text-input id="course_type" type="text" wire:model="course_type" placeholder="{{ __('Enter Course Type') }}" name="course_type" class="w-full mt-1" :value="old('course_type', $course_type)" autocomplete="course_type" />
      <x-input-error :messages="$errors->get('course_type')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="course_category" :value="__('Selete Course Category')" />
      <x-input-select id="course_category" wire:model.live="course_category" name="course_category" class="text-center w-full mt-1" :value="old('course_category', $course_category)" required autocomplete="course_category">
        <x-select-option class="text-start" value="" hidden> -- Select Course Category -- </x-select-option>
        <x-select-option class="text-start" value="1">Professional</x-select-option>
        <x-select-option class="text-start" value="2">Non Professional</x-select-option>
      </x-input-select>
      <x-input-error :messages="$errors->get('course_category')" class="mt-1" />
    </div>
  </div>
  <x-form-btn wire:loading.attr="disabled">Submit</x-form-btn>
</div>
