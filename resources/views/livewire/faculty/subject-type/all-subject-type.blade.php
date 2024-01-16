<div>
    @if ($mode == 'add')
        <div>
            <x-card-header heading="Add Subject Type">
                <x-back-btn wire:click="setmode('all')" />
            </x-card-header>
            <x-form wire:submit="save()">
                @include('livewire.faculty.subject-type.subjecttype-form')
            </x-form>
        </div>
    @elseif($mode == 'edit')
        <x-card-header heading="Edit Subject Type">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="update({{ $subjecttype_id }})">
            @include('livewire.faculty.subject-type.subjecttype-form')
        </x-form>
    @elseif($mode == 'view')
        <x-card-header heading="View Subject Type">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        @include('livewire.faculty.subject-type.view-form')
    @elseif($mode == 'all')
        <div>
            <x-card-header heading="All Subject Types">
                <x-add-btn wire:click="setmode('add')" />
            </x-card-header>
            <x-table.frame>
                <x-slot:header>
                </x-slot>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                                <x-table.th wire:click="sort_column('type_name')" name="type_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject Type Name</x-table.th>
                                <x-table.th wire:click="sort_column('type_shortname')" name="type_shortname" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject Type Shortname</x-table.th>
                                <x-table.th wire:click="sort_column('active')" name="active" :sort="$sortColumn" :sort_by="$sortColumnBy"> Status </x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @foreach ($subjecttypes as $subjecttype)
                                <x-table.tr wire:key="{{ $subjecttype->id }}">
                                    <x-table.td> {{ $subjecttype->id }} </x-table.td>
                                    <x-table.td> {{ $subjecttype->type_name }} </x-table.td>
                                    <x-table.td> {{ $subjecttype->type_shortname }} </x-table.td>
                                    <x-table.td>
                                        @if ($subjecttype->active == 0)
                                            <x-status type="danger"> Inactive </x-status>
                                        @elseif ($subjecttype->active == 1)
                                            <x-status type="success"> Active </x-status>
                                        @endif
                                    </x-table.td>
                                    <x-table.td>
                                        @if ($subjecttype->deleted_at)
                                            <x-table.delete wire:click="deleteconfirmation({{ $subjecttype->id }})" />
                                            <x-table.restore wire:click="restore({{ $subjecttype->id }})" />
                                        @else
                                            <x-table.view wire:click="view({{ $subjecttype->id }})" />
                                            <x-table.edit wire:click="edit({{ $subjecttype->id }})" />
                                            @if ($subjecttype->active == 0)
                                                <x-table.active wire:click="changestatus({{ $subjecttype->id }})" />
                                            @elseif ($subjecttype->active == 1)
                                                <x-table.inactive wire:click="changestatus({{ $subjecttype->id }})" />
                                            @endif
                                            <x-table.archive wire:click="softdelete({{ $subjecttype->id }})" />
                                        @endif
                                    </x-table.td>
                                </x-table.tr>
                            @endforeach
                        </x-table.tbody>
                    </x-table.table>
                </x-slot>
                <x-slot:footer>
                    <x-table.paginate :data="$subjecttypes" />
                </x-slot>
            </x-table.frame>
        </div>
    @endif
</div>
