<div>
    @if ($mode=='add')
    <div>
        <x-card-header>
            Add Roletype
            <x-slot name="button">
                <x-back-btn wire:click="setmode('all')" />
            </x-slot>
        </x-card-header>
        <x-form wire:submit="save()">
            @include('livewire.faculty.faculty-roletype.roletype-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header>
        Edit Roletype
        <x-slot name="button">
            <x-back-btn wire:click="setmode('all')" />
        </x-slot>
    </x-card-header>
    <x-form wire:submit="update({{ $roletype_id }})">
        @include('livewire.faculty.faculty-roletype.roletype-form')
    </x-form>
    @elseif($mode='all')
        <div>
            <x-card-header>
                All Roletypes
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
                        <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                        <x-table.th wire:click="sort_column('roletype_name')" name="roletype_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Role Type Name</x-table.th>
                        <x-table.th> Action </x-table.th>
                      </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                      @foreach ($roletypes as $roletype)
                        <x-table.tr wire:key="{{ $roletype->id }}">
                          <x-table.td>{{ $roletype->id }} </x-table.td>
                          <x-table.td>{{ $roletype->roletype_name }} </x-table.td>
                          <x-table.td>
                            @if($roletype->deleted_at)
                                <x-table.edit wire:click="edit({{ $roletype->id }})"/>
                                <x-table.restore wire:click="restore({{ $roletype->id }})"/>
                            @else
                                <x-table.edit wire:click="edit({{ $roletype->id }})"/>
                                <x-table.delete wire:click="softdelete({{ $roletype->id }})"/>
                            @endif
                          </x-table.td>
                        </x-table.tr>
                      @endforeach
                    </x-table.tbody>
                  </x-table.table>
                </x-slot>
                <x-slot:footer>
                  <x-table.paginate :data="$roletypes" />
                </x-slot>
            </x-table.frame>
        </div>
    @endif
</div>
