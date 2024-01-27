<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Exam Time Table
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_id" :value="__('Select Subject')" />
            <x-input-select id="subject_id" wire:model="subject_id" name="subject_id" class="text-center w-full mt-1" :value="old('subject_id', $subject_id)" required autocomplete="subject_id">
                <x-select-option class="text-start" hidden> -- Select Subject -- </x-select-option>
                @forelse ($subjects as $subject)
                <x-select-option wire:key="{{ $subject->id }}" value="{{ $subject->id }}" class="text-start"> {{ $subject->subject_name }} </x-select-option>
                @empty
                <x-select-option class="text-start">Subject Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('subject_id')" class="mt-1" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="exam_patternclasses_id" :value="__('Select Exam Pattern Class')" />
            <x-input-select id="exam_patternclasses_id" wire:model="exam_patternclasses_id" name="exam_patternclasses_id" class="text-center w-full mt-1" :value="old('exam_patternclasses_id', $exam_patternclasses_id)" required autocomplete="exam_patternclasses_id">
                <x-select-option class="text-start" hidden> -- Select Exam Pattern Classes -- </x-select-option>
                @forelse ($exampatternclasses as $exam_pattern_class)
                <x-select-option wire:key="{{ $exam_pattern_class->id }}" value="{{ $exam_pattern_class->id }}" class="text-start"> {{ $exam_pattern_class->exam->exam_name ?? '-' }} {{ $exam_pattern_class->patternclass->pattern->pattern_name ?? '-' }} {{ $exam_pattern_class->patternclass->courseclass->classyear->classyear_name ?? '-' }} {{ $exam_pattern_class->patternclass->courseclass->course->course_name ?? '-' }} </x-select-option>
                @empty
                <x-select-option class="text-start">Exam Pattern Classes Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('exam_patternclasses_id')" class="mt-1" />
        </div>

        <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="timeslot_id" :value="__('Select Time Slot')" />
            <x-input-select id="timeslot_id" wire:model="timeslot_id" name="timeslot_id" class="text-center w-full mt-1" :value="old('timeslot_id', $timeslot_id)" required autocomplete="timeslot_id">
                <x-select-option class="text-start" hidden> -- Select Time Slot -- </x-select-option>
                @forelse ($timeslots as $timeslot)
                <x-select-option wire:key="{{ $timeslot->id }}" value="{{ $timeslot->id }}" class="text-start"> {{ $timeslot->timeslot }} </x-select-option>
                @empty
                <x-select-option class="text-start">Time Slot Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('timeslot_id')" class="mt-1" />
        </div>
         <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="examdate" :value="__('Exam Date')" />
            <x-text-input id="examdate" type="date" wire:model="examdate" placeholder="{{ __('Exam Date') }}" name="examdate" class="w-full mt-1" :value="old('examdate', $examdate)" autocomplete="examdate" />
            <x-input-error :messages="$errors->get('examdate')" class="mt-1" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="status" :value="__('Status')" />
            <x-required />
            <x-input-select id="status" wire:model="status" name="status" class="text-center  w-full mt-1" :value="old('status',$status)" required autocomplete="status">
                <x-select-option class="text-start" hidden> -- Select -- </x-select-option>
                <x-select-option class="text-start" value="0">Inactive</x-select-option>
                <x-select-option class="text-start" value="1">Active</x-select-option>
            </x-input-select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>
        </div>
    </div>
    <x-form-btn wire:loading.attr="disabled">Submit</x-form-btn>
</div>
