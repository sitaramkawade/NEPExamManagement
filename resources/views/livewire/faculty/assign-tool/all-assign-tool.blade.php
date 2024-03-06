<div>
    @if ($mode == 'add')
        <div>
            <x-card-header heading="Assign Tool">
                <x-back-btn wire:click="setmode('all')" />
            </x-card-header>
            <x-form wire:submit="save()">
                @include('livewire.faculty.assign-tool.assigntool-form')
            </x-form>
        </div>
    @elseif($mode == 'edit')
        <x-card-header heading="Edit Assigned Tool">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="update({{ $assignedtool_id }})">
            @include('livewire.faculty.assign-tool.assigntool-form')
        </x-form>
    @elseif($mode == 'view')
        <x-card-header heading="View Assigned Tool">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        @include('livewire.faculty.assign-tool.view-form')
    @elseif($mode == 'all')
        <div>
            <x-breadcrumb.breadcrumb>
                <x-breadcrumb.link route="faculty.dashboard" name="Dashboard" />
                <x-breadcrumb.link name="Assign Tool's" />
            </x-breadcrumb.breadcrumb>
            <x-card-header heading="All Assigned Tool's">
                <x-add-btn wire:click="setmode('add')" />
            </x-card-header>
            <x-table.frame>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th>ID</x-table.th>
                                <x-table.th wire:click="sort_column('subject_id')" name="subject_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject Name</x-table.th>
                                <x-table.th wire:click="sort_column('patternclass_id')" name="patternclass_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Patternclass</x-table.th>
                                <x-table.th wire:click="sort_column('faculty_id')" name="faculty_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Faculty Name</x-table.th>
                                <x-table.th >Document Name</x-table.th>
                                <x-table.th >Academic Year</x-table.th>
                                {{-- <x-table.th> Status </x-table.th> --}}
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($groupedassignedInternalTools as $assignedToolSubjectId => $assignedInternalTools)
                                <x-table.tr wire:key="{{ $assignedInternalTools->first()->id }}">
                                    <x-table.td>{{ $counter++ }}</x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $assignedInternalTools->first()->subject->subject_name }}</x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>
                                            {{ $assignedInternalTools->first()->subject->patternclass->pattern->pattern_name }} -
                                            {{ $assignedInternalTools->first()->subject->patternclass->courseclass->classyear->classyear_name }} -
                                            {{ $assignedInternalTools->first()->subject->patternclass->courseclass->course->course_name }}
                                        </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $assignedInternalTools->first()->faculty->faculty_name }}</x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        @forelse ($assignedInternalTools as $internalToolDoc)
                                            <x-table.text-scroll>{{ optional($internalToolDoc->internaltooldocumentmaster)->doc_name }}</x-table.text-scroll>
                                        @empty
                                            <x-table.text-scroll>No Documents</x-table.text-scroll>
                                        @endforelse
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $assignedInternalTools->first()->academicyear->year_name }}</x-table.text-scroll>
                                    </x-table.td>
                                    {{-- <x-table.td>
                                        <x-table.text-scroll>{{ $assignedInternalTools->first()->academicyear->year_name }}</x-table.text-scroll>
                                    </x-table.td> --}}
                                    <x-table.td>
                                        @if ($assignedInternalTools->first()->deleted_at)
                                            <x-table.delete wire:click="deleteconfirmation({{ $assignedInternalTools->first()->subject->id }})" />
                                            <x-table.restore wire:click="restore({{ $assignedInternalTools->first()->subject_id }})" />
                                        @else
                                            <x-table.view wire:click="view({{ $assignedInternalTools->first()->subject_id }})" />
                                            <x-table.edit wire:click="edit({{ $assignedInternalTools->first()->subject_id }})" />
                                            <x-table.archive wire:click="softdelete({{ $assignedInternalTools->first()->subject_id }})" />
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
                    {{-- <x-table.paginate :data="$assignedInternalTools" /> --}}
                </x-slot>
            </x-table.frame>
        </div>
    @endif
</div>
