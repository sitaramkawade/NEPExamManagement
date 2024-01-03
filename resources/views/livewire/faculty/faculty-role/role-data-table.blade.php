<div>
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
            @foreach ($data as $role)
              <x-table.tr wire:key="{{ $role->id }}">
                <x-table.td>{{ $role->id }} </x-table.td>
                <x-table.td>{{ $role->role_name }} </x-table.td>
                <x-table.td>{{ $role->roletype->roletype_name ?? '' }}</x-table.td>
                <x-table.td class="text-balance">{{ $role->college->college_name ?? '' }}</x-table.td>
                <x-table.td>
                    @if($role->deleted_at)
                        <x-table.edit :href="route('faculty.edit-role.faculty', $role->id)"/>
                        <x-table.restore :href="route('faculty.restore-role.faculty', $role->id)"/>
                    @else
                        <x-table.edit :href="route('faculty.edit-role.faculty', $role->id)"/>
                        <x-table.delete :href="route('faculty.delete-role.faculty', $role->id)"/>
                    @endif
                  {{-- <x-table.view/>
                  <x-table.hide/>
                  <x-table.archive/> --}}
                  {{-- <x-table.active/>
                  <x-table.inactive/>
                  <x-table.download> Download</x-table.download> --}}

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
