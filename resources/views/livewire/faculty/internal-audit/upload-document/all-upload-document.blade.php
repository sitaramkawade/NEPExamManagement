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
                    <x-input-select id="academicyear_id" wire:model.live="academicyear_id" name="academicyear_id" class="text-center @error('academicyear_id') is-invalid @enderror w-full mt-1" :value="old('academicyear_id', $academicyear_id)" required autofocus autocomplete="academicyear_id">
                        <x-select-option class="text-start" hidden> -- Select Academic Year -- </x-select-option>
                        @forelse ($academicyears as $academicyearid => $academicyearname)
                            <x-select-option wire:key="{{ $academicyearid }}" value="{{ $academicyearid }}" class="text-start">{{ $academicyearname }}</x-select-option>
                        @empty
                            <x-select-option class="text-start">Academic Years Not Found</x-select-option>
                        @endforelse
                    </x-input-select>
                    <x-input-error :messages="$errors->get('academicyear_id')" class="mt-2" />
                </div>
                {{-- <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="patternclass_id" :value="__('Select Pattern Class')" />
                    <x-select2.select style="width:100%;" id="patternclass_id" name="patternclass_id" wire:model='patternclass_id' data-placeholder>
                        <x-select2.option value=""></x-select2.option>
                        @forelse ($pattern_classes as $patternclassid => $patternclass)
                            <x-select2.option wire:key="{{ $patternclassid }}" value="{{ $patternclassid }}" class="text-start">
                                {{ $patternclass['classyear_name'] ?? '-' }} {{ $patternclass['course_name'] ?? '-' }} {{ $patternclass['pattern_name'] ?? '-' }}
                            </x-select2.option>
                        @empty
                            <x-select-option class="text-start">Pattern Classes Not Found</x-select-option>
                        @endforelse
                    </x-select2.select>
                    <x-input-error :messages="$errors->get('patternclass_id')" class="mt-1" />
                </div> --}}
                <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="patternclass_id" :value="__('Select Pattern Class')" />
                    <x-input-select id="patternclass_id" wire:model.live="patternclass_id" name="patternclass_id" class="text-center w-full mt-1" :value="old('patternclass_id', $patternclass_id)" required autocomplete="patternclass_id">
                        <x-select-option class="text-start" hidden> -- Select Pattern Classes -- </x-select-option>
                        @forelse ($pattern_classes as $patternclassid => $patternclass)
                            <x-select-option wire:key="{{ $patternclassid }}" value="{{ $patternclassid }}" class="text-start">
                                {{ $patternclass['classyear_name'] ?? '-' }} {{ $patternclass['course_name'] ?? '-' }} {{ $patternclass['pattern_name'] ?? '-' }}
                            </x-select-option>
                        @empty
                            <x-select-option class="text-start">Pattern Classes Not Found</x-select-option>
                        @endforelse
                    </x-input-select>
                    <x-input-error :messages="$errors->get('patternclass_id')" class="mt-1" />
                </div>

                <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="subject_id" :value="__('Select Subject')" />
                    <x-input-select id="subject_id" wire:model.live="subject_id" name="subject_id" class="text-center w-full mt-1" :value="old('subject_id', $subject_id)" required autocomplete="subject_id">
                        <x-select-option hidden> -- Select Subject -- </x-select-option>
                        @forelse ($subjects as $subjectid => $subject)
                            <x-select-option wire:key="{{ $subjectid }}" value="{{ $subjectid }}" class="text-start">
                                {{ $subject['subject_code'] }} - {{ $subject['subject_name'] }}
                            </x-select-option>
                        @empty
                            <x-select-option class="text-start">Subjects Not Found</x-select-option>
                        @endforelse
                    </x-input-select>
                    <x-input-error :messages="$errors->get('subject_id')" class="mt-1" />
                </div>

            </div>
        </div>
        <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
            <div class="bg-primary px-2 text-center py-1 font-semibold text-white dark:text-light">
                Documents Pending Upload
            </div>
            <div class="overflow-x-auto">
                <x-table.table>
                    <x-table.thead>
                        <x-table.tr>
                            <x-table.th>ID</x-table.th>
                            <x-table.th>Document Name</x-table.th>
                            <x-table.th>Preview</x-table.th>
                            <x-table.th>Action</x-table.th>
                        </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                        @forelse ($documents as $doc)
                            <x-table.tr wire:key="{{ $doc->id }}">
                                <x-table.td>{{ $counter_one++ }}</x-table.td>
                                <x-table.td>
                                    <x-table.text-scroll>{{ $doc->internaltooldocumentmaster->doc_name ?? '' }}</x-table.text-scroll>
                                </x-table.td>
                                <x-table.td>
                                    <div class="h-[80px] w-[80px] rounded overflow-hidden">
                                        @if (isset($document_to_upload[$doc->id]))
                                            @if ($document_to_upload[$doc->id]->getClientOriginalExtension() === 'pdf')
                                                <img src="{{ asset('img/pdf.png') }}" alt="PDF" class="h-full w-full object-cover" />
                                            @else
                                                <img src="{{ asset($document_to_upload[$doc->id]->temporaryUrl()) }}" alt="File Preview" class="h-full w-full object-cover" />
                                            @endif
                                        @else
                                            <img src="{{ asset('img/no-img.png') }}" alt="No Image" class="h-full w-full object-cover" />
                                        @endif
                                    </div>
                                </x-table.td>
                                <x-table.td>
                                    <x-form wire:submit="save({{ $doc->id }})" id="document_to_upload.{{ $doc->id }}">
                                        <div class="flex items-center mb-2">
                                            <x-input-file class="text-xs file:px-2 file:rounded-sm file:text-xs w-[75%] mr-2" name="document_to_upload.{{ $doc->id }}" id="document_to_upload.{{ $doc->id }}" wire:model.live="document_to_upload.{{ $doc->id }}" accept="image/png, image/jpeg, image/jpg, .pdf"/>
                                            <x-table.upload-btn i="0" wire:loading.attr="disabled" wire:target="document_to_upload.{{ $doc->id }}" wire:loading.class.remove="cursor-pointer" wire:loading.class.add="cursor-not-allowed" >Upload</x-table.upload-btn>
                                        </div>
                                            @error("document_to_upload.{$doc->id}")
                                                <div class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</div>
                                            @enderror
                                        <x-input-label wire:loading.flex wire:target="document_to_upload.{{ $doc->id }}" class="py-0 text-xs" for="document_to_upload.{{ $doc->id }}" :value="__('Uploading...')" />
                                    </x-form>
                                </x-table.td>
                            </x-table.tr>
                        @empty
                            <x-table.tr>
                                <x-table.td colSpan='4' class="text-center">No Data Found</x-table.td>
                            </x-table.tr>
                        @endforelse
                    </x-table.tbody>
                </x-table.table>
            </div>
        </div>
        <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
            <div class="bg-primary px-2 text-center py-1 font-semibold text-white dark:text-light">
                Uploaded Documents
            </div>
            <div class="overflow-x-auto">
                <x-table.table>
                    <x-table.thead>
                        <x-table.tr>
                            <x-table.th>ID</x-table.th>
                            <x-table.th>Document Name</x-table.th>
                            <x-table.th>Action</x-table.th>
                        </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                        @forelse ($uploaded_documents as $uploaded_document)
                            <x-table.tr wire:key="{{ $uploaded_document->id }}">
                                <x-table.td>{{ $counter_two++ }}</x-table.td>
                                <x-table.td>
                                    <x-table.text-scroll>{{ $uploaded_document->internaltooldocumentmaster->doc_name ?? '' }}</x-table.text-scroll>
                                </x-table.td>
                                <x-table.td>
                                    <div class="flex items-center space-x-2">
                                        <x-view-image-model-btn src="{{ isset($uploaded_document->document_filePath) ? asset($uploaded_document->document_filePath) : asset('img/no-img.png') }}" />
                                        <x-table.delete wire:click="deleteconfirmation({{ $uploaded_document->id }})" />
                                    </div>
                                </x-table.td>
                            </x-table.tr>
                        @empty
                            <x-table.tr>
                                <x-table.td colSpan='3' class="text-center">No Data Found</x-table.td>
                            </x-table.tr>
                        @endforelse
                    </x-table.tbody>
                </x-table.table>
            </div>
        </div>
    @endif
</div>
