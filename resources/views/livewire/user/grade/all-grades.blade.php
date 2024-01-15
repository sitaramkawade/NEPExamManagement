<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading="Add Grade">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.grade.grade-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Grade">
        <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $grade_id  }})">
        @include('livewire.user.grade.grade-form')
    </x-form>
    @elseif($mode=='all')
    <div>
        <x-card-header heading=" All Grade's">
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
                                <x-table.th wire:click="sort_column('max_percentage')" name="max_percentage" :sort="$sortColumn" :sort_by="$sortColumnBy">Max Percentage </x-table.th>
                                <x-table.th wire:click="sort_column('min_percentage')" name="min_percentage" :sort="$sortColumn" :sort_by="$sortColumnBy">Min Percentage </x-table.th>
                                <x-table.th wire:click="sort_column('grade_point')" name="grade_point" :sort="$sortColumn" :sort_by="$sortColumnBy">Grade Point</x-table.th>
                                <x-table.th wire:click="sort_column('grade_name')" name="grade_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Grade Name </x-table.th>
                                <x-table.th wire:click="sort_column('description')" name="description" :sort="$sortColumn" :sort_by="$sortColumnBy">Description </x-table.th>
                                <x-table.th wire:click="sort_column('is_active')" name="is_active" :sort="$sortColumn" :sort_by="$sortColumnBy">Status </x-table.th>

                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($grades as $key => $grade)
                            <x-table.tr wire:key="{{ $grade->id }}">
                                <x-table.td> {{ $key+1 }}</x-table.td>
                                <x-table.td>
                                    {{ $grade->max_percentage }}
                                </x-table.td>
                                <x-table.td> {{ $grade->min_percentage}} </x-table.td>
                                <x-table.td>
                                    {{ $grade->grade_point }}
                                </x-table.td>
                                <x-table.td>
                                    {{ $grade->grade_name }}
                                </x-table.td>
                                <x-table.td>
                                    {{ $grade->description }}
                                </x-table.td>
                                <x-table.td>
                                    @if($grade->is_active==1)
                                    <x-status type="success">Active</x-status>
                                    @else
                                    <x-status type="danger">Inactive</x-status>
                                    @endif
                                </x-table.td>
                                <x-table.td>
                                    @if ($grade->deleted_at)
                                    <x-table.delete wire:click="deleteconfirmation({{ $grade->id }})" />
                                    <x-table.restore wire:click="restore({{ $grade->id }})" />
                                    @else
                                    <x-table.edit wire:click="edit({{ $grade->id }})" />
                                    @if($grade->is_active==1)
                                    <x-table.inactive wire:click="Status({{ $grade->id }})" />
                                    @else
                                    <x-table.active wire:click="Status({{ $grade->id }})" />
                                    @endif
                                    <x-table.archive wire:click="delete({{ $grade->id }})" />

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
                        <x-table.paginate :data="$grades" />
                        </x-slot>
        </x-table.frame>
    </div>
    @endif
</div>
