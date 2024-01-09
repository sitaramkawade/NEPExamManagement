<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading="Add Role">
                <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="save()">
            @include('livewire.faculty.faculty-role.role-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Role">
            <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $role_id }})">
        @include('livewire.faculty.faculty-role.role-form')
    </x-form>
    @elseif($mode='all')
        <div>
            <x-card-header heading="All Roles">
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
                        <x-table.th wire:click="sort_column('role_name')" name="role_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Role</x-table.th>
                        <x-table.th wire:click="sort_column('roletype_id')" name="roletype_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Role Type</x-table.th>
                        <x-table.th wire:click="sort_column('college_id')" name="college_id" :sort="$sortColumn" :sort_by="$sortColumnBy">College</x-table.th>
                        <x-table.th> Action </x-table.th>
                      </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                      @foreach ($roles as $role)
                        <x-table.tr wire:key="{{ $role->id }}">
                          <x-table.td>{{ $role->id }} </x-table.td>
                          <x-table.td>{{ $role->role_name }} </x-table.td>
                          <x-table.td>{{ $role->roletype->roletype_name ?? '' }}</x-table.td>
                          <x-table.td class="text-balance">{{ $role->college->college_name ?? '' }}</x-table.td>
                          <x-table.td>
                            @if ($role->deleted_at)
                                            <x-table.restore wire:click="restore({{ $role->id }})" />
                                            <x-table.delete wire:click="deleteconfirmation({{ $role->id }})" />
                                        @else
                                            <x-table.edit wire:click="edit({{ $role->id }})" />
                                            <x-table.archive wire:click="softdelete({{ $role->id }})" />
                                            {{-- @if ($role->status == 0)
                                                <x-table.active wire:click="status({{ $role->id }})" />
                                            @elseif ($role->status == 1)
                                                <x-table.inactive wire:click="status({{ $role->id }})" />
                                            @elseif ($role->status == 3)
                                                <x-table.active wire:click="status({{ $role->id }})" />
                                            @endif
                                            <x-table.archive wire:click="delete({{ $role->id }})" /> --}}
                                        @endif
                          </x-table.td>
                        </x-table.tr>
                      @endforeach
                    </x-table.tbody>
                  </x-table.table>
                </x-slot>
                <x-slot:footer>
                  <x-table.paginate :data="$roles" />
                </x-slot>
              </x-table.frame>
        </div>
    @endif
</div>
