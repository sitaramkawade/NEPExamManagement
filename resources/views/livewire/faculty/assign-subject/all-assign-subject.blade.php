<div>
    @if ($mode == 'add')
        <div>
            <x-card-header heading="Assign Subject">
                <x-back-btn wire:click="setmode('all')" />
            </x-card-header>
            <x-form wire:submit="save()">
                @include('livewire.faculty.assign-subject.assignsubject-form')
            </x-form>
        </div>
    @elseif($mode == 'edit')
        <x-card-header heading="Edit Assign Subject">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="update({{ $subject_id }})">
            @include('livewire.faculty.assign-subject.assignsubject-form')
        </x-form>
    @elseif($mode == 'view')
        <x-card-header heading="View Assign Subject">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        @include('livewire.faculty.assign-subject.view-form')
    @elseif($mode == 'all')
        <div>
            <x-breadcrumb.breadcrumb>
                <x-breadcrumb.link route="faculty.dashboard" name="Dashboard" />
                <x-breadcrumb.link name="Assign Subject's" />
            </x-breadcrumb.breadcrumb>
            <x-card-header heading="All Assign Subject's">
                <x-add-btn wire:click="setmode('add')" />
            </x-card-header>
            <x-table.frame>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                                <x-table.th wire:click="sort_column('department_id')" name="department_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Department</x-table.th>
                                <x-table.th wire:click="sort_column('patternclass_id')" name="patternclass_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Patternclass</x-table.th>
                                <x-table.th wire:click="sort_column('subjectcategory_id')" name="subjectcategory_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject Category</x-table.th>
                                <x-table.th wire:click="sort_column('subject_id')" name="subject_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject</x-table.th>
                                <x-table.th wire:click="sort_column('academicyear_id')" name="academicyear_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Academic Year</x-table.th>
                                <x-table.th> Status </x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($assignsubjects as $assignsubject)
                                <x-table.tr wire:key="{{ $assignsubject->id }}">
                                    <x-table.td>{{ $assignsubject->id }} </x-table.td>
                                    <x-table.td>{{ $assignsubject->department->dept_name }} </x-table.td>
                                    <x-table.td>{{ $assignsubject->patternclass->courseclass->classyear->classyear_name }}-{{ $assignsubject->patternclass->courseclass->course->course_name }}-{{ $assignsubject->patternclass->pattern->pattern_name }}</x-table.td>
                                    <x-table.td></x-table.td>
                                    <x-table.td></x-table.td>
                                    <x-table.td></x-table.td>
                                    <x-table.td>
                                        @if (!$assignsubject->deleted_at)
                                            @if ($assignsubject->status === 1)
                                                <x-table.active wire:click="status({{ $assignsubject->id }})" />
                                            @else
                                                <x-table.inactive wire:click="status({{ $assignsubject->id }})" />
                                            @endif
                                        @endif
                                    </x-table.td>
                                    <x-table.td>
                                        @if ($assignsubject->deleted_at)
                                            <x-table.delete wire:click="deleteconfirmation({{ $assignsubject->id }})" />
                                            <x-table.restore wire:click="restore({{ $assignsubject->id }})" />
                                        @else
                                            <x-table.view wire:click="view({{ $assignsubject->id }})" />
                                            <x-table.edit wire:click="edit({{ $assignsubject->id }})" />
                                            <x-table.archive wire:click="softdelete({{ $assignsubject->id }})" />
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
                    <x-table.paginate :data="$assignsubjects" />
                </x-slot>
            </x-table.frame>
        </div>
    @endif
</div>
