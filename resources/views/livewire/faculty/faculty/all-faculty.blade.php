<div>
    @if ($mode=='add')
    <div>
        <x-card-header>
            Add Faculty
            <x-slot name="button">
                <x-back-btn wire:click="setmode('all')" />
            </x-slot>
        </x-card-header>
        <x-form wire:submit="save()">
            @include('livewire.faculty.faculty.faculty-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header>
        Edit Faculty
        <x-slot name="button">
            <x-back-btn wire:click="setmode('all')" />
        </x-slot>
    </x-card-header>
    <x-form wire:submit="update({{ $faculty_id }})">
        @include('livewire.faculty.faculty.faculty-form')
    </x-form>
    @elseif($mode='all')
        <div>
            <x-card-header>
                All Faculties
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
                        <x-table.th wire:click="sort_column('faculty_name')" name="faculty_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Name</x-table.th>
                        <x-table.th wire:click="sort_column('role_id')" name="role_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Designation</x-table.th>
                        <x-table.th wire:click="sort_column('mobile_no')" name="mobile_no" :sort="$sortColumn" :sort_by="$sortColumnBy">Mobile No</x-table.th>
                        <x-table.th> Action </x-table.th>
                      </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                      @foreach ($faculties as $faculty)
                        <x-table.tr wire:key="{{ $faculty->id }}">
                          <x-table.td>{{ $faculty->id }} </x-table.td>
                          <x-table.td>{{ $faculty->faculty_name }} </x-table.td>
                          <x-table.td> {{ $faculty->role->role_name ?? '' }} </x-table.td>
                          <x-table.td> {{ $faculty->mobile_no }} </x-table.td>
                          <x-table.td>
                              @if($faculty->deleted_at)
                                  <x-table.edit wire:click="edit({{ $faculty->id }})"/>
                                  <x-table.restore wire:click="restore({{ $faculty->id }})"/>
                              @else
                                  <x-table.edit wire:click="edit({{ $faculty->id }})"/>
                                  <x-table.delete wire:click="softdelete({{ $faculty->id }})"/>
                              @endif
                          </x-table.td>
                        </x-table.tr>
                      @endforeach
                    </x-table.tbody>
                  </x-table.table>
                </x-slot>
                <x-slot:footer>
                  <x-table.paginate :data="$faculties" />
                </x-slot>
              </x-table.frame>
        </div>
    @endif
</div>
