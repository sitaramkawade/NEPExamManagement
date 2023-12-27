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
              <x-table.th>No.</x-table.th>
              {{-- <x-table.th wire:click="sort_column('faculties.id')" name="faculties.id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th> --}}
              <x-table.th wire:click="sort_column('faculties.faculty_name')" name="faculties.faculty_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Name</x-table.th>
              <x-table.th wire:click="sort_column('roles.role_name')" name="roles.role_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Designation</x-table.th>
              <x-table.th wire:click="sort_column('faculties.mobile_no')" name="faculties.mobile_no" :sort="$sortColumn" :sort_by="$sortColumnBy">Mobile No</x-table.th>
              <x-table.th> Action </x-table.th>
            </x-table.tr>
          </x-table.thead>
          <x-table.tbody>
            @foreach ($data as $key => $faculty)
              <x-table.tr wire:key="{{ $faculty->id }}">
                <x-table.td>{{ $key+1 }}</x-table.td>
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
