<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading="Add Department Type">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.department-type.department-type-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Department Type">
        <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $dept_id  }})">
        @include('livewire.user.department.department-form')
    </x-form>
    @elseif($mode=='all')
    <div>
        <x-card-header heading=" All Department Type's">
            <x-add-btn wire:click="setmode('add')" />
        </x-card-header>
        <x-table.frame>
            <x-slot:header>
                </x-slot>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
                                <x-table.th wire:click="sort_column('departmenttype')" name="departmenttype" :sort="$sortColumn" :sort_by="$sortColumnBy">Department Type</x-table.th>
                                <x-table.th wire:click="sort_column('description')" name="description" :sort="$sortColumn" :sort_by="$sortColumnBy">Description </x-table.th>
                                <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status </x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($departmenttypes as $key => $depttype)
                            <x-table.tr wire:key="{{ $depttype->id }}">
                                <x-table.td> {{ $key+1 }}</x-table.td>
                                <x-table.td>
                                    {{ $depttype->departmenttype }}
                                </x-table.td>
                                <x-table.td> {{ $depttype->description}} </x-table.td>
                                <x-table.td>
                                    @if($depttype->status==1)
                                    <x-status type="success">Active</x-status>
                                    @else
                                    <x-status type="danger">Inactive</x-status>
                                    @endif
                                </x-table.td>
                                <x-table.td>
                                    @if ($depttype->deleted_at)
                                    <x-table.delete wire:click="deleteconfirmation({{ $depttype->id }})" />
                                    <x-table.restore wire:click="restore({{ $depttype->id }})" />
                                    @else
                                    <x-table.edit wire:click="edit({{ $depttype->id }})" />
                                    @if($depttype->status==1)
                                    <x-table.inactive wire:click="Status({{ $depttype->id }})" />
                                    @else
                                    <x-table.active wire:click="Status({{ $depttype->id }})" />
                                    @endif
                                    <x-table.archive wire:click="delete({{ $depttype->id }})" />
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
                        <x-table.paginate :data="$departmenttypes" />
                        </x-slot>
        </x-table.frame>
    </div>
    @endif
</div>
