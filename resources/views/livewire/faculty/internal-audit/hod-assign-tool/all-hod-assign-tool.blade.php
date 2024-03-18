<div>
    {{-- @if ($mode == 'add')
        <div>
            <x-card-header heading="Add Roletype">
                <x-back-btn wire:click="setmode('all')" />
            </x-card-header>
            <x-form wire:submit="save()">
                @include('livewire.faculty.faculty-roletype.roletype-form')
            </x-form>
        </div>
    @elseif($mode == 'edit')
        <x-card-header heading="Edit Roletype">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="update({{ $roletype_id }})">
            @include('livewire.faculty.faculty-roletype.roletype-form')
        </x-form>
    @elseif($mode == 'view')
        <x-card-header heading="View Roletype">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        @include('livewire.faculty.faculty-roletype.view-form') --}}
    @if($mode == 'all')
        <div>
            <x-breadcrumb.breadcrumb>
                <x-breadcrumb.link route="faculty.dashboard" name="Dashboard" />
                <x-breadcrumb.link name="Faculty Internal Documents" />
            </x-breadcrumb.breadcrumb>
            <x-card-header heading="Faculty Internal Documents">
                {{-- <x-add-btn wire:click="setmode('add')" /> --}}
            </x-card-header>
            <x-table.frame>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                                <x-table.th wire:click="sort_column('academicyear_id')" name="academicyear_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Academic Year</x-table.th>
                                <x-table.th wire:click="sort_column('faculty_id')" name="faculty_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Faculty Name</x-table.th>
                                <x-table.th wire:click="sort_column('subject_id')" name="subject_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject Name</x-table.th>
                                <x-table.th wire:click="sort_column('internaltooldocument_id')" name="internaltooldocument_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Document Name</x-table.th>
                                {{-- <x-table.th wire:click="sort_column('document_fileName')" name="document_fileName" :sort="$sortColumn" :sort_by="$sortColumnBy">File Name</x-table.th>
                                <x-table.th wire:click="sort_column('document_filePath')" name="document_filePath" :sort="$sortColumn" :sort_by="$sortColumnBy">File Path</x-table.th> --}}
                                {{-- <x-table.th wire:click="sort_column('departmenthead_id')" name="departmenthead_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Department Head</x-table.th> --}}
                                {{-- <x-table.th wire:click="sort_column('verifybyfaculty_id')" name="verifybyfaculty_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Verified By Faculty</x-table.th>
                                <x-table.th wire:click="sort_column('verificationremark')" name="verificationremark" :sort="$sortColumn" :sort_by="$sortColumnBy">Verification Remark</x-table.th> --}}
                                <x-table.th> Status </x-table.th>
                                {{-- <x-table.th> Action </x-table.th> --}}
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($faculty_internal_documents as $faculty_internal_document)
                                <x-table.tr wire:key="{{ $faculty_internal_document->id }}">
                                    <x-table.td>{{ $faculty_internal_document->id }} </x-table.td>
                                    <x-table.td>{{ $faculty_internal_document->academicyear->year_name }} </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $faculty_internal_document->faculty->faculty_name }}</x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $faculty_internal_document->subject->subject_name }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $faculty_internal_document->internaltooldocumentmaster->doc_name }}</x-table.text-scroll>
                                    </x-table.td>
                                    {{-- <x-table.td>{{ $faculty_internal_document->document_fileName }} </x-table.td>
                                    <x-table.td>{{ $faculty_internal_document->document_filePath }} </x-table.td> --}}
                                    {{-- <x-table.td>
                                        <x-table.text-scroll>{{ $faculty_internal_document->faculty->faculty_name }}</x-table.text-scroll>
                                    </x-table.td> --}}
                                    {{-- <x-table.td>{{ $faculty_internal_document->faculty->faculty_name }} </x-table.td>
                                    <x-table.td>{{ $faculty_internal_document->verificationremark }} </x-table.td> --}}
                                    <x-table.td>
                                        @if (!$faculty_internal_document->deleted_at)
                                            @if ($faculty_internal_document->document_fileName !==null && $faculty_internal_document->document_filePath !==null )
                                                <x-status type="success">Uploaded</x-status>
                                            @else
                                                <x-status type="danger"> Not Uploaded</x-status>
                                            @endif
                                        @endif
                                    </x-table.td>
                                    {{-- <x-table.td>
                                        @if ($faculty_internal_document->deleted_at)
                                            <x-table.delete wire:click="deleteconfirmation({{ $faculty_internal_document->id }})" />
                                            <x-table.restore wire:click="restore({{ $faculty_internal_document->id }})" />
                                        @else
                                            <x-table.view wire:click="view({{ $faculty_internal_document->id }})" />
                                            <x-table.edit wire:click="edit({{ $faculty_internal_document->id }})" />
                                            <x-table.archive wire:click="softdelete({{ $faculty_internal_document->id }})" />
                                        @endif
                                    </x-table.td> --}}
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
