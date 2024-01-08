<div>
    @if ($mode=='add')
    <div>
        <x-card-header>
            Add Pattern
            <x-slot name="button">
                <x-back-btn wire:click="setmode('all')" />
            </x-slot>
        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.pattern.pattern-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header>
        Edit Pattern
        <x-slot name="button">
            <x-back-btn wire:click="setmode('all')" />
        </x-slot>
    </x-card-header>
    <x-form wire:submit="update({{ $pattern_id  }})">
        @include('livewire.user.pattern.pattern-form')
    </x-form>
    @elseif($mode='all')
    <div>
        <x-card-header>
            All Pattern
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
                                <x-table.th wire:click="sort_column('pattern_name')" name="pattern_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Pattern Name </x-table.th>
                                <x-table.th wire:click="sort_column('pattern_startyear')" name="pattern_startyear" :sort="$sortColumn" :sort_by="$sortColumnBy">Pattern Start Year </x-table.th>
                                <x-table.th wire:click="sort_column('pattern_valid')" name="pattern_valid" :sort="$sortColumn" :sort_by="$sortColumnBy">Pattern Valid</x-table.th>
                                <x-table.th wire:click="sort_column('college_id')" name="college_id" :sort="$sortColumn" :sort_by="$sortColumnBy">College</x-table.th>
                                <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($patterns as $key => $pattern)
                            <x-table.tr wire:key="{{ $pattern->id }}">
                                <x-table.td>{{ $key+1 }}</x-table.td>
                                <x-table.td class="text-pretty">{{ $pattern->pattern_name }} </x-table.td>
                                <x-table.td>{{ $pattern->pattern_startyear }} </x-table.td>
                                <x-table.td> {{ $pattern->pattern_valid }} </x-table.td>
                                <x-table.td class="text-pretty"> {{ $pattern->college?->college_name }} </x-table.td>
                                <x-table.td> {{ $pattern->status==0?"Inactive":"Active";}} </x-table.td>

                                <x-table.td>
                                    <x-table.edit wire:click="edit({{$pattern->id}})" />
                                    <x-table.delete wire:click="deletePattern({{$pattern->id}})" />

                                </x-table.td>
                            </x-table.tr>
                            @empty
                            <x-table.tr>
                                <x-table.td colSpan='6'>No Data Found</x-table.td>
                            </x-table.tr>
                            @endforelse
                        </x-table.tbody>
                    </x-table.table>
                    </x-slot>
                    <x-slot:footer>
                        <x-table.paginate :data="$patterns" />
                        </x-slot>
        </x-table.frame>
    </div>
    @endif
</div>
