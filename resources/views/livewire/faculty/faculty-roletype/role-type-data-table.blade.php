<div>
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
              @foreach ($data as $roletype)
                <x-table.tr wire:key="{{ $roletype->id }}">
                  <x-table.td>{{ $roletype->id }} </x-table.td>
                  <x-table.td>{{ $roletype->roletype_name }} </x-table.td>
                  <x-table.td>
                      @if($roletype->deleted_at)
                          <x-table.edit :href="route('faculty.edit-roletype.faculty', $roletype->id)"/>
                          <x-table.restore :href="route('faculty.restore-roletype.faculty', $roletype->id)"/>
                      @else
                          <x-table.edit :href="route('faculty.edit-roletype.faculty', $roletype->id)"/>
                          <x-table.delete :href="route('faculty.delete-roletype.faculty', $roletype->id)"/>
                      @endif
                  </x-table.td>
                </x-table.tr>
              @endforeach
            </x-table.tbody>
          </x-table.table>
        </x-slot>
        <x-slot:footer>
          <x-table.paginate :data="$data" />
        </x-slot>
    </x-table.frame>
</div>
