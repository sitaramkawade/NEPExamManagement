<div>
    <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
      <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Import Admission Data  <x-spinner/>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-4 py-2">
        <div class="px-2 py-2 text-sm text-gray-600 dark:text-gray-400">
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
        <div class="px-2 py-2 text-sm text-gray-600 dark:text-gray-400">
          <x-input-label for="subjectcategory_id" :value="__('Select Subject Category')" />
          <x-input-select id="subjectcategory_id" wire:model.live="subjectcategory_id" name="subjectcategory_id" class="text-center w-full mt-1" :value="old('subjectcategory_id', $subjectcategory_id)" required autocomplete="subjectcategory_id">
            <x-select-option class="text-start" hidden> -- Select Subject Category -- </x-select-option>
            @forelse ($subject_categories as $subject_category_id => $subject_category_name)
              <x-select-option wire:key="{{ $subject_category_id }}" value="{{ $subject_category_id}}" class="text-start"> {{ $subject_category_name?? '-' }}  </x-select-option>
            @empty
              <x-select-option class="text-start">Subject Categories Not Found</x-select-option>
            @endforelse
          </x-input-select>
          <x-input-error :messages="$errors->get('subjectcategory_id')" class="mt-1" />
        </div>
        <div class="px-2 py-2  text-sm text-gray-600 dark:text-gray-400">
          <x-input-label for="subject_id" :value="__('Select Subject')" />
          <x-input-select id="subject_id" wire:model="subject_id" name="subject_id" class="text-center w-full mt-1" :value="old('subject_id', $subject_id)" required autocomplete="subject_id">
            <x-select-option class="text-start" hidden> -- Select Subject -- </x-select-option>
            @forelse ($subjects as $subjectid => $subjectname)
              <x-select-option wire:key="{{ $subjectid }}" value="{{ $subjectid }}" class="text-start"> {{ $subjectname }} </x-select-option>
            @empty
              <x-select-option class="text-start">Subjects Not Found</x-select-option>
            @endforelse
          </x-input-select>
          <x-input-error :messages="$errors->get('subject_id')" class="mt-1" />
        </div>
        <div class="px-2 py-2 text-sm text-gray-600 dark:text-gray-400 relative">
          <x-input-label for="subject_id" :value="__('Choose File')" />
          <div class="m-1 w-full inline-flex">
            <form class="w-full inline-flex" wire:submit.prevent="import()">
              <input accept=".xlsx, .csv" type="file" wire:model="importfile" class="w-full bg-white block flex-auto rounded-l h-10 text-sm file:mr-4 file:py-2.5 file:px-4 file:border-0 file:text-sm file:font-semibold dark:file:bg-primary file:text-white dark:hover:file:bg-primary-darker hover:file:bg-primary-darker file:bg-primary border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm dark:border-primary-darker border" />
              <button type="submit" wire:loading.attr="disabled" class="hover:bg-primary-600 cursor-pointer focus:bg-primary-600 active:bg-primary-700 inline-block h-10 rounded-r bg-primary px-3 pb-2 pt-2.5 text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init type="button" id="button-addon2">
                <span wire:loading.attr='hidden' wire:target='import'>Import</span>
                <span wire:loading  wire:target='import'> <x-spinner/></span>
              </button>
            </form>
          </div>
          @error('importfile')
            <span class="absolute block left-5 bottom--5 mb-2 text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
</div>
