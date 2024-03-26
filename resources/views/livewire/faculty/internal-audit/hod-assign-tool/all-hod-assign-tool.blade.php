<div>
    @if ($mode == 'view')
        <div>
            <x-card-header heading="View Uploaded Documents">
                <x-back-btn wire:click="setmode('all')" />
            </x-card-header>
            @include('livewire.faculty.internal-audit.hod-assign-tool.view-tool-document')
        </div>
    @elseif ($mode == 'all')
        <div>
            <x-breadcrumb.breadcrumb>
                <x-breadcrumb.link route="faculty.dashboard" name="Dashboard" />
                <x-breadcrumb.link name="Faculty Internal Documents" />
            </x-breadcrumb.breadcrumb>
            <x-card-header heading="Faculty Internal Documents">
            </x-card-header>
            <x-table.frame :x="0" :r="0">
                <x-slot:header>
                    <x-input-select id="academicyear_id" wire:model.live="academicyear_id" name="academicyear_id" class="text-center  h-8.5 mt-1">
                        <x-select-option class="text-start" hidden>Year </x-select-option>
                        @foreach ($academicyears as $a_id)
                            <x-select-option wire:key="{{ $a_id->id }}" value="{{ $a_id->id }}" class="text-start">{{ $a_id->year_name }}</x-select-option>
                        @endforeach
                    </x-input-select>
                    <span class="py-2">
                        <x-table.cancel class="p-2" wire:click='clear()' i="0"> Clear</x-table.cancel>
                    </span>
                </x-slot:header>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                                <x-table.th>Subject Code</x-table.th>
                                <x-table.th wire:click="sort_column('subject_id')" name="subject_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject Name</x-table.th>
                                <x-table.th wire:click="sort_column('internaltooldocument_id')" name="internaltooldocument_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Document Name</x-table.th>
                                <x-table.th> Status </x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($faculty_internal_documents as $faculty_internal_document)
                                <x-table.tr wire:key="{{ $faculty_internal_document->id }}">
                                    <x-table.td>{{ $faculty_internal_document->id }} </x-table.td>
                                    <x-table.td>{{ $faculty_internal_document->subject->subject_code }} </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $faculty_internal_document->subject->subject_name }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $faculty_internal_document->internaltooldocument->internaltooldocumentmaster->doc_name }}</x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        @if (!$faculty_internal_document->deleted_at)
                                            @if ($faculty_internal_document->status === 1)
                                                <x-table.active wire:click="status({{ $faculty_internal_document->id }})" />
                                            @else
                                                <x-table.inactive wire:click="status({{ $faculty_internal_document->id }})" />
                                            @endif
                                        @endif
                                    </x-table.td>
                                    <x-table.td>
                                        @if ($faculty_internal_document->deleted_at)
                                            <x-table.delete wire:click="deleteconfirmation({{ $faculty_internal_document->id }})" />
                                            <x-table.restore wire:click="restore({{ $faculty_internal_document->id }})" />
                                        @else
                                            <x-table.view wire:click="view({{ $faculty_internal_document->id }})" />
                                            <x-table.archive wire:click="delete({{ $faculty_internal_document->id }})" />
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
                </x-slot>
                <x-slot:footer>
                    <x-table.paginate :data="$faculty_internal_documents" />
                </x-slot>
            </x-table.frame>
        </div>
    @endif
</div>
