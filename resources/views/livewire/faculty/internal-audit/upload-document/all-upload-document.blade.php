<div>
    @if ($mode == 'all')
        <x-breadcrumb.breadcrumb>
            <x-breadcrumb.link route="faculty.dashboard" name="Dashboard" />
            <x-breadcrumb.link name="Upload Document's" />
        </x-breadcrumb.breadcrumb>
        <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
            <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
                Fetch Tool Document's
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1">
                <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="academicyear_id" :value="__('Academic Year')" />
                    <x-input-select id="academicyear_id" wire:model="academicyear_id" name="academicyear_id" class="text-center @error('academicyear_id') is-invalid @enderror w-full mt-1" :value="old('academicyear_id', $academicyear_id)" required autofocus autocomplete="academicyear_id">
                        <x-select-option class="text-start" hidden> -- Select Academic Year -- </x-select-option>
                        @forelse ($academicyears as $academicyearid => $academicyearname)
                            <x-select-option wire:key="{{ $academicyearid }}" value="{{ $academicyearid }}" class="text-start">{{ $academicyearname }}</x-select-option>
                        @empty
                            <x-select-option class="text-start">Academic Years Not Found</x-select-option>
                        @endforelse
                    </x-input-select>
                    <x-input-error :messages="$errors->get('academicyear_id')" class="mt-2" />
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
                    <x-input-label for="patternclass_id" :value="__('Select Pattern Class')" />
                    <x-input-select id="patternclass_id" wire:model.live="patternclass_id" name="patternclass_id" class="text-center w-full mt-1" :value="old('patternclass_id', $patternclass_id)" required autocomplete="patternclass_id">
                        <x-select-option class="text-start" hidden> -- Select Pattern Classes -- </x-select-option>
                        @forelse ($pattern_classes as $pattern_class)
                            <x-select-option wire:key="{{ $pattern_class->id }}" value="{{ $pattern_class->id }}" class="text-start"> {{ $pattern_class->courseclass->classyear->classyear_name ?? '-' }} {{ $pattern_class->courseclass->course->course_name ?? '-' }} {{ $pattern_class->pattern->pattern_name ?? '-' }} </x-select-option>
                        @empty
                            <x-select-option class="text-start">Pattern Classes Not Found</x-select-option>
                        @endforelse
                    </x-input-select>
                    <x-input-error :messages="$errors->get('patternclass_id')" class="mt-1" />
                </div>
                <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="subject_id" :value="__('Select Subject')" />
                    <x-input-select id="subject_id" wire:model.live="subject_id" name="subject_id" class="text-center w-full mt-1" :value="old('subject_id', $subject_id)" required autocomplete="subject_id">
                        <x-select-option class="text-start" hidden> -- Select Subject -- </x-select-option>
                        @forelse ($subjects as $subject)
                            <x-select-option wire:key="{{ $subject->id }}" value="{{ $subject->id }}" class="text-start"> {{ $subject->subject_name }}</x-select-option>
                        @empty
                            <x-select-option class="text-start">Subjects Not Found</x-select-option>
                        @endforelse
                    </x-input-select>
                    <x-input-error :messages="$errors->get('subject_id')" class="mt-1" />
                    </div>
                </div>
            </div>
            <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
                <div class="bg-primary px-2 text-center py-2 font-semibold text-white dark:text-light">
                    Documents Pending Upload
                </div>
                <x-table.table>
                    <x-table.thead>
                    <x-table.tr>
                        <x-table.th>ID</x-table.th>
                        <x-table.th>Academic Year</x-table.th>
                        <x-table.th>Pattern Class</x-table.th>
                        <x-table.th>Subject Name</x-table.th>
                        <x-table.th>Faculty Name</x-table.th>
                        <x-table.th>Document Name</x-table.th>
                        <x-table.th>Action</x-table.th>
                    </x-table.tr>
                </x-table.thead>
                <x-table.tbody>
                    @forelse ($documents_to_upload as $document_to_upload)
                        <x-table.tr wire:key="{{ $document_to_upload->id }}">
                            <x-table.td>{{ $counter++ }} </x-table.td>
                            <x-table.td> {{ isset($document_to_upload->academicyear->year_name) ? $document_to_upload->academicyear->year_name : '' }} </x-table.td>
                            <x-table.td>
                                <x-table.text-scroll>
                                    {{ (isset($document_to_upload->subject->patternclass->pattern->pattern_name) ? $document_to_upload->subject->patternclass->pattern->pattern_name : '') . ' ' . (isset($document_to_upload->subject->patternclass->courseclass->classyear->classyear_name) ? $document_to_upload->subject->patternclass->courseclass->classyear->classyear_name : '') . ' ' . (isset($document_to_upload->subject->patternclass->courseclass->course->course_name) ? $document_to_upload->subject->patternclass->courseclass->course->course_name : '') }}
                                </x-table.text-scroll>
                            </x-table.td>
                            <x-table.td>
                                <x-table.text-scroll>{{ isset($document_to_upload->subject->subject_name) ? $document_to_upload->subject->subject_name : '' }}</x-table.text-scroll>
                            </x-table.td>
                            <x-table.td>
                                <x-table.text-scroll>{{ isset($document_to_upload->faculty->faculty_name) ? $document_to_upload->faculty->faculty_name : '' }}</x-table.text-scroll>
                            </x-table.td>
                            <x-table.td>
                                <x-table.text-scroll>{{ isset($document_to_upload->internaltooldocumentmaster->doc_name) ? $document_to_upload->internaltooldocumentmaster->doc_name : '' }}</x-table.text-scroll>
                            </x-table.td>
                            <x-table.td>
                                <x-form wire:submit.prevent="save({{ $document_to_upload->id }})">
                                    <x-input-label wire:loading.remove wire:target="file.{{ $document_to_upload->id }}" class="py-2 text-xs" for="file.{{ $document_to_upload->id }}" :value="__('Hint : 250KB, png, jpg/jpeg, pdf')" />
                                    <x-input-file class="text-xs file:px-2 file:rounded-sm file:mx-0 file:text-xs w-[80%]" name="file.{{ $document_to_upload->id }}" id="file.{{ $document_to_upload->id }}" wire:model="file.{{ $document_to_upload->id }}" accept="image/png, image/jpg, image/jpeg,.pdf" />
                                    <x-input-label wire:loading.flex wire:target="file.{{ $document_to_upload->id }}" class="py-2 text-xs" for="file.{{ $document_to_upload->id }}" :value="__('Uploading...')" />
                                    <x-table.save-btn i="0" wire:loading.attr="disabled" wire:target="file.{{ $document_to_upload->id }}" wire:loading.class.remove="cursor-pointer" wire:loading.class.add="cursor-not-allowed">save</x-table.save-btn>
                                </x-form>
                                    {{-- <x-table.view i="0" class="mt-2 uppercase" wire:loading.attr="disabled" wire:loading.class.add="cursor-not-allowed" >view</x-table.view>
                                    <x-table.delete i="0" class="mt-2 uppercase" wire:loading.attr="disabled" wire:loading.class.add="cursor-not-allowed" >delete</x-table.delete> --}}
                            </x-table.td>
                        </x-table.tr>
                    @empty
                        <x-table.tr>
                            <x-table.td colSpan='8' class="text-center">No Data Found</x-table.td>
                        </x-table.tr>
                    @endforelse
                </x-table.tbody>
            </x-table.table>
        </div>
        {{-- <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
            <div class="bg-primary text-center px-2 py-2 font-semibold text-white dark:text-light">
                Uploaded Document's
            </div>
            <x-table.table>
                <x-table.thead>
                    <x-table.tr>
                        <x-table.tr>
                            <x-table.th>ID</x-table.th>
                            <x-table.th>Academic Year</x-table.th>
                            <x-table.th>Pattern Class</x-table.th>
                            <x-table.th>Subject Name</x-table.th>
                            <x-table.th>Faculty Name</x-table.th>
                            <x-table.th>Document Name</x-table.th>
                            <x-table.th> Status </x-table.th>
                            <x-table.th> Action </x-table.th>
                        </x-table.tr>
                    </x-table.tr>
                </x-table.thead>
                <x-table.tbody>
                    @forelse ($roletypes as $roletype)
                        <x-table.tr wire:key="{{ $roletype->id }}">
                            <x-table.td>{{ $roletype->id }} </x-table.td>
                            <x-table.td>{{ $roletype->roletype_name }} </x-table.td>
                            <x-table.td>
                                @if (!$roletype->deleted_at)
                                    @if ($roletype->status === 1)
                                        <x-table.active wire:click="status({{ $roletype->id }})" />
                                    @else
                                        <x-table.inactive wire:click="status({{ $roletype->id }})" />
                                    @endif
                                @endif
                            </x-table.td>
                            <x-table.td>
                                @if ($roletype->deleted_at)
                                    <x-table.delete wire:click="deleteconfirmation({{ $roletype->id }})" />
                                    <x-table.restore wire:click="restore({{ $roletype->id }})" />
                                @else
                                    <x-table.view wire:click="view({{ $roletype->id }})" />
                                    <x-table.edit wire:click="edit({{ $roletype->id }})" />
                                    <x-table.archive wire:click="softdelete({{ $roletype->id }})" />
                                @endif
                            </x-table.td>
                        </x-table.tr>
                    @empty
                        <x-table.tr>
                            <x-table.td colSpan='8' class="text-center">No Data Found</x-table.td>
                        </x-table.tr>
                    @endforelse
                </x-table.tbody>
            </x-table.table>
        </div> --}}
    @endif
</div>
