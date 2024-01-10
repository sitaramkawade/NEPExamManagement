<div>
    @if ($mode=='add')
    <div>
        <x-card-header>
            Add College
            <x-slot name="button">
                <x-back-btn wire:click="setmode('all')" />
            </x-slot>
        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.college.college-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header>
        Edit College
        <x-slot name="button">
            <x-back-btn wire:click="setmode('all')" />
        </x-slot>
    </x-card-header>
    <x-form wire:submit="updateCollege({{ $college_id  }})">
       @include('livewire.user.college.college-form')
       
    </x-form>
    @elseif($mode='all')
    <div>
        <x-card-header>
            All College
            <x-slot name="button">
                <x-add-btn wire:click="setmode('add')" />
            </x-slot>
        </x-card-header>
        <x-table.frame>
            <x-slot:header>
                </x-slot>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
                                <x-table.th wire:click="sort_column('college_name')" name="college_name" :sort="$sortColumn" :sort_by="$sortColumnBy">College Name </x-table.th>
                                <x-table.th wire:click="sort_column('college_email')" name="college_email" :sort="$sortColumn" :sort_by="$sortColumnBy">College Email </x-table.th>
                                <x-table.th wire:click="sort_column('college_address')" name="college_address" :sort="$sortColumn" :sort_by="$sortColumnBy">College Address</x-table.th>
                                <x-table.th wire:click="sort_column('sanstha_id')" name="sanstha_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Sanstha </x-table.th>
                                <x-table.th wire:click="sort_column('university_id')" name="university_id" :sort="$sortColumn" :sort_by="$sortColumnBy">University</x-table.th>
                                <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($colleges as $key => $college)
                            <x-table.tr wire:key="{{ $college->id }}">
                                <x-table.td> {{ $key+1 }}</x-table.td>
                                <x-table.td> {{ $college->college_name }} </x-table.td>
                                <x-table.td> {{ $college->college_email}} </x-table.td>
                                <x-table.td> {{ $college->college_address }} </x-table.td>
                                <x-table.td> {{ $college->sanstha->sanstha_name }} </x-table.td>
                                <x-table.td> {{ $college->university->university_name }} </x-table.td>
                                <x-table.td> {{ $college->status==0?"Inactive":"Active";}} </x-table.td>
                                <x-table.td>
                                    <x-table.edit wire:click="edit({{ $college->id }})" />
                                    <x-table.delete wire:click="deleteCollege({{ $college->id }})" />
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
                        <x-table.paginate :data="$colleges" />
                        </x-slot>
        </x-table.frame>
    </div>
    @endif
</div>
