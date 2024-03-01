
<div>
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Exam Time Table Subject Wise
        <x-spinner />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 py-2">
        <div class="px-2 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectcategory_id" :value="__('Select Subject Category')" />
            <x-input-select id="subjectcategory_id" wire:model.live="subjectcategory_id" name="subjectcategory_id" class="text-center w-full mt-1" :value="old('subjectcategory_id', $subjectcategory_id)" required autocomplete="subjectcategory_id">
                <x-select-option class="text-start" hidden> -- Select Subject Category -- </x-select-option>
                @forelse ($subject_categories as $subject_category_id => $subject_category_name)
                <x-select-option wire:key="{{ $subject_category_id }}" value="{{ $subject_category_id}}" class="text-start"> {{ $subject_category_name?? '-' }} </x-select-option>
                @empty
                <x-select-option class="text-start">Subject Categories Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('subjectcategory_id')" class="mt-1" />
        </div>

        <div class="px-2 py-2  text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_id" :value="__('Select Subject')" />
            <x-input-select id="subject_id" wire:model.live="subject_id" name="subject_id" class="text-center w-full mt-1" :value="old('subject_id', $subject_id)" required autocomplete="subject_id">
                <x-select-option class="text-start" hidden> -- Select Subject -- </x-select-option>
                @forelse ($subjects as $subjectid => $subjectname)
                <x-select-option wire:key="{{ $subjectid }}" value="{{ $subjectid }}" class="text-start"> {{ $subjectname }} </x-select-option>
                @empty
                <x-select-option class="text-start">Subjects Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('subject_id')" class="mt-1" />
        </div>

        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="examdate" :value="__('Select Date')" />
            <x-text-input id="examdate" type="date" wire:model.live="examdate" name="examdate" class="w-full mt-1" />
            <x-input-error :messages="$errors->get('examdate')" class="mt-1" />
        </div>

        <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="timeslot_id" :value="__('Select Time Slot')" />
            <x-input-select id="timeslot_id" wire:model.live="timeslot_id" name="timeslot_id" class="text-center w-full mt-1">
                <x-select-option class="text-start" hidden> -- Select Time Slot -- </x-select-option>
                @forelse ($timeslots as $timeid=>$timeslot)
                <x-select-option wire:key="{{ $timeid }}" value="{{ $timeid }}" class="text-start"> {{ $timeslot }} </x-select-option>
                @empty
                <x-select-option class="text-start">Time Slot Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('timeslot_id')" class="mt-1" />
        </div>
    </div>

    <x-table.table>
        <x-table.thead>
            <x-table.tr>
                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
                <x-table.th wire:click="sort_column('exampatternclass')" name="exampatternclass" :sort="$sortColumn" :sort_by="$sortColumnBy">Pattern Class</x-table.th>
                <x-table.th wire:click="sort_column('examdate')" name="examdate" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Date</x-table.th>
                <x-table.th wire:click="sort_column('timeslot_id')" name="timeslot_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Time Slot</x-table.th>
            </x-table.tr>
        </x-table.thead>
        <x-table.tbody>
            @foreach($exampatternclasses as $exampatternclass )
            <x-table.tr>
                <x-table.tr wire:key="{{ $exampatternclass->id }}">
                    <x-table.td> {{ $exampatternclass->id }} </x-table.td>
                    <x-table.td> {{ isset($exampatternclass->patternclass->pattern->pattern_name) ? $exampatternclass->patternclass->pattern->pattern_name : '-' }} {{ isset($exampatternclass->patternclass->courseclass->classyear->classyear_name) ? $exampatternclass->patternclass->courseclass->classyear->classyear_name : '-' }} {{ isset($exampatternclass->patternclass->courseclass->course->course_name) ? $exampatternclass->patternclass->courseclass->course->course_name : '-' }} </x-table.td>
                    <x-table.td>
                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="examdates.{{ $exampatternclass->id }}"  />
                            <x-text-input id="examdates.{{ $exampatternclass->id }}" type="date" wire:model="examdates.{{ $exampatternclass->id }}"  name="examdates.{{ $exampatternclass->id }}" class="w-full mt-1"  />
                            <x-input-error :messages="$errors->get('examdates.{$exampatternclass->id}')" class="mt-1" />
                        </div>
                    </x-table.td>

                    <x-table.td>
                        <div class="px-5 py-2  text-sm text-gray-600 dark:text-gra-400">
                            <x-input-label for="timeslot_ids.{{ $exampatternclass->id }}" />
                            <x-input-select id="timeslot_ids.{{ $exampatternclass->id }}" wire:model="timeslot_ids.{{ $exampatternclass->id }}" name="timeslot_ids.{{ $exampatternclass->id }}" class="text-center w-full mt-1">
                                <x-select-option class="text-start" hidden> -- Select Time Slot -- </x-select-option>
                                @forelse ($timeslots as $timeid=>$timeslot)
                                <x-select-option wire:key="{{ $timeid}}" value="{{ $timeid }}" class="text-start"> {{ $timeslot }} </x-select-option>
                                @empty
                                <x-select-option class="text-start">Time Slot Not Found</x-select-option>
                                @endforelse
                            </x-input-select>
                            <x-input-error :messages="$errors->get('timeslot_ids.{$exampatternclass->id}')" class="mt-1" />
                        </div>
                    </x-table.td>
                </x-table.tr>
            </x-table.tr>
            @endforeach
        </x-table.tbody>
    </x-table.table>
    <x-form-btn wire:loading.attr="disabled">Submit</x-form-btn>
</div>












{{-- 
<div>
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Exam Time Table Subject wise
        <x-spinner />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 py-2">

        <div class="px-2 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectcategory_id" :value="__('Select Subject Category')" />
            <x-input-select id="subjectcategory_id" wire:model.live="subjectcategory_id" name="subjectcategory_id" class="text-center w-full mt-1" :value="old('subjectcategory_id', $subjectcategory_id)" required autocomplete="subjectcategory_id">
                <x-select-option class="text-start" hidden> -- Select Subject Category -- </x-select-option>
                @forelse ($subject_categories as $subject_category_id => $subject_category_name)
                <x-select-option wire:key="{{ $subject_category_id }}" value="{{ $subject_category_id}}" class="text-start"> {{ $subject_category_name?? '-' }} </x-select-option>
                @empty
                <x-select-option class="text-start">Subject Categories Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('subjectcategory_id')" class="mt-1" />
        </div>
        <div class="px-2 py-2  text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_id" :value="__('Select Subject')" />
            <x-input-select id="subject_id" wire:model.live="subject_id" name="subject_id" class="text-center w-full mt-1" :value="old('subject_id', $subject_id)" required autocomplete="subject_id">
                <x-select-option class="text-start" hidden> -- Select Subject -- </x-select-option>
                @forelse ($subjects as $subjectid => $subjectname)
                <x-select-option wire:key="{{ $subjectid }}" value="{{ $subjectid }}" class="text-start"> {{ $subjectname }} </x-select-option>
                @empty
                <x-select-option class="text-start">Subjects Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('subject_id')" class="mt-1" />
        </div>
        
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="examdates" :value="__('Select Date')" />
            <x-text-input id="examdates" type="date" wire:model="examdates"  name="examdates" class="w-full mt-1"  />
            <x-input-error :messages="$errors->get('examdates')" class="mt-1" />
        </div>
        <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="timeslot_id" :value="__('Select Time Slot')" />
            <x-input-select id="timeslot_id" wire:model.live="timeslot_id" name="timeslot_id" class="text-center w-full mt-1">
                <x-select-option class="text-start" hidden> -- Select Time Slot -- </x-select-option>
                @forelse ($timeslots as $timeid=>$timeslot)
                <x-select-option wire:key="{{ $timeid }}" value="{{ $timeid }}" class="text-start"> {{ $timeslot }} </x-select-option>
                @empty
                <x-select-option class="text-start">Time Slot Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('timeslot_id')" class="mt-1" />
        </div>
    </div>
    <x-table.table>
        <x-table.thead>
            <x-table.tr>
                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
                <x-table.th wire:click="sort_column('patternclass')" name="patternclass" :sort="$sortColumn" :sort_by="$sortColumnBy">Pattern Class</x-table.th>
                <x-table.th wire:click="sort_column('examdate')" name="examdate" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Date</x-table.th>
                <x-table.th wire:click="sort_column('timeslot_id')" name="timeslot_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Time Slot</x-table.th>
            </x-table.tr>
        </x-table.thead>
        <x-table.tbody>
            @foreach($patternclasses as $patternclass)
                <x-table.tr>
                    <x-table.tr wire:key="{{ $patternclass->id }}">
                    <x-table.td>  {{ $patternclass->id }} </x-table.td>
                    <x-table.td>  {{ isset($patternclass->pattern->pattern_name) ? $patternclass->pattern->pattern_name : '-' }} {{ isset($patternclass->courseclass->classyear->classyear_name) ? $patternclass->courseclass->classyear->classyear_name : '-' }} {{ isset($patternclass->courseclass->course->course_name) ? $patternclass->courseclass->course->course_name : '-' }} </x-table.td>
                    <x-table.td>
                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="examdates"  />
                            <x-text-input id="examdates" type="date" wire:model="examdates"  name="examdates" class="w-full mt-1"  />
                            <x-input-error :messages="$errors->get('examdates')" class="mt-1" />
                        </div>
                    </x-table.td>
                    <x-table.td>
                        <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="timeslot_id" />
                            <x-input-select id="timeslot_id" wire:model.live="timeslot_id" name="timeslot_id" class="text-center w-full mt-1">
                                <x-select-option class="text-start" hidden> -- Select Time Slot -- </x-select-option>
                                @forelse ($timeslots as $timeid=>$timeslot)
                                <x-select-option wire:key="{{ $timeid }}" value="{{ $timeid }}" class="text-start"> {{ $timeslot }} </x-select-option>
                                @empty
                                <x-select-option class="text-start">Time Slot Not Found</x-select-option>
                                @endforelse
                            </x-input-select>
                            <x-input-error :messages="$errors->get('timeslot_id')" class="mt-1" />
                        </div>
                    </x-table.td>
                </x-table.tr>
                </x-table.tr>
            @endforeach
        </x-table.tbody>
    </x-table.table>
    <x-form-btn wire:loading.attr="disabled">Submit</x-form-btn>
</div> --}}
