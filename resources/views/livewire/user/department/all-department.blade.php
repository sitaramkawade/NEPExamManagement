<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading="Add Department">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.department.department-form')
        </x-form>
    </div>
     @elseif($mode=='edit')
    <x-card-header heading="Edit Department">
        <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $dept_id  }})">
        @include('livewire.user.department.department-form')
    </x-form>
     @elseif($mode=='all')
    <div>
        <x-card-header heading=" All Department's">
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
                                <x-table.th wire:click="sort_column('dept_name')" name="dept_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Department</x-table.th>
                                <x-table.th wire:click="sort_column('short_name')" name="short_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Short Name </x-table.th>
                                <x-table.th wire:click="sort_column('departmenttype')" name="departmenttype" :sort="$sortColumn" :sort_by="$sortColumnBy">Department Type</x-table.th>
                                <x-table.th wire:click="sort_column('college_id')" name="college_id" :sort="$sortColumn" :sort_by="$sortColumnBy">College </x-table.th>
                                <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status </x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($departments as $key => $dept)
                            <x-table.tr wire:key="{{ $dept->id }}">
                                <x-table.td> {{ $key+1 }}</x-table.td>
                                <x-table.td>
                                    {{ $dept->dept_name }}
                                </x-table.td>
                                <x-table.td> {{ $dept->short_name}} </x-table.td>
                                <x-table.td>
                                @if ($dept->departmenttype==0)
                                 <x-status >Inactive</x-status>
                                 @elseif($dept->departmenttype==1)
                                  <x-status >UG</x-status>
                                 @elseif($dept->departmenttype==2)
                                  <x-status >PG</x-status>
                                 @elseif($dept->departmenttype==3)
                                  <x-status >UG & PG</x-status>
                                 @elseif($dept->departmenttype==4)
                                  <x-status >Doctorate</x-status>
                                 @else
                                  <x-status >All</x-status>
                               @endif

                                </x-table.td>
                                <x-table.td><x-table.text-scroll>
                                    {{ $dept->college->college_name }}
                                    </x-table.text-scroll>
                                </x-table.td>
                                
                                <x-table.td>
                                    @if($dept->status==1)
                                    <x-status type="success">Active</x-status>
                                    @else
                                    <x-status type="danger">Inactive</x-status>
                                    @endif
                                </x-table.td>
                                <x-table.td>
                                    @if ($dept->deleted_at)
                                    <x-table.delete wire:click="deleteconfirmation({{ $dept->id }})" />
                                    <x-table.restore wire:click="restore({{ $dept->id }})" />
                                    @else
                                    <x-table.edit wire:click="edit({{ $dept->id }})" />
                                    @if($dept->status==1)
                                    <x-table.inactive wire:click="Status({{ $dept->id }})" />
                                    @else
                                    <x-table.active wire:click="Status({{ $dept->id }})" />
                                    @endif
                                    <x-table.archive wire:click="delete({{ $dept->id }})" />

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
                        <x-table.paginate :data="$departments" />
                        </x-slot>
        </x-table.frame>
</div>
@endif
</div>
