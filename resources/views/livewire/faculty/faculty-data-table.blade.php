<div>
    <x-table.frame>
      <x-slot:header>
        <x-table.perpage />
        <x-table.search />
        <x-spinner/>
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
            @foreach ($data as $faculty)
              <x-table.tr wire:key="{{ $faculty->id }}">
                <x-table.td>{{ $faculty->id }} </x-table.td>
                <x-table.td>{{ $faculty->faculty_name }} </x-table.td>
                <x-table.td> {{ $faculty->role->role_name ?? '' }} </x-table.td>
                <x-table.td> {{ $faculty->mobile_no }} </x-table.td>
                <x-table.td>
                    @if($faculty->deleted_at)
                        <x-table.edit :href="route('faculty.edit.faculty', $faculty->id)"/>
                        <x-table.restore :href="route('faculty.restore.faculty', $faculty->id)"/>
                    @else
                        <x-table.edit :href="route('faculty.edit.faculty', $faculty->id)"/>
                        <x-table.delete :href="route('faculty.delete.faculty', $faculty->id)"/>
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
