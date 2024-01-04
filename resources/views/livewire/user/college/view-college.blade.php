<div class="p-5">
  <x-card-header href="{{ route('user.college') }}">
    All Colleges
    <x-slot name=button>
      <x-add-btn/>
    </x-slot>
  </x-card-header>

  <x-table.frame>


    <x-slot:body>
      <x-table.table>
        <x-table.thead>
          <x-table.tr>
            <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>

            <x-table.th wire:click="sort_column('college_name')" name="college_name" :sort="$sortColumn" :sort_by="$sortColumnBy">College Name </x-table.th>
            <x-table.th wire:click="sort_column('college_email')" name="college_email" :sort="$sortColumn" :sort_by="$sortColumnBy">College Email </x-table.th>
            <x-table.th wire:click="sort_column('college_address')" name="college_address" :sort="$sortColumn" :sort_by="$sortColumnBy">College Address</x-table.th>
            {{-- <x-table.th wire:click="sort_column('college_contact_no')" name="college_contact_no" :sort="$sortColumn" :sort_by="$sortColumnBy">College Contact No.</x-table.th>
            <x-table.th wire:click="sort_column('college_website_url')" name="college_website_url" :sort="$sortColumn" :sort_by="$sortColumnBy">College website url.</x-table.th> --}}
            <x-table.th wire:click="sort_column('sanstha_id')" name="sanstha_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Sanstha </x-table.th>
            <x-table.th wire:click="sort_column('university_id')" name="university_id" :sort="$sortColumn" :sort_by="$sortColumnBy">University</x-table.th>
            <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
            <x-table.th> Action </x-table.th>
          </x-table.tr>
        </x-table.thead>
        <x-table.tbody>
          @forelse ($colleges as $key => $college)
            <x-table.tr wire:key="{{ $college->id }}">
              <x-table.td>{{ $key + 1 }}</x-table.td>
              <x-table.td long="1" >{{ $college->college_name }} </x-table.td>
              <x-table.td  > {{ $college->college_email }} </x-table.td>
              <x-table.td> {{ $college->college_address }} </x-table.td>
              {{-- <x-table.td> {{ $college->college_contact_no }} </x-table.td>
              <x-table.td> {{ $college->college_website_url }} </x-table.td> --}}
              <x-table.td> {{ $college->sanstha->sanstha_name }} </x-table.td>
              <x-table.td> {{ $college->university->university_name }} </x-table.td>
              <x-table.td> {{ $college->status == 0 ? 'Inactive' : 'Active' }} </x-table.td>

              <x-table.td>
                <x-table.edit wire:navigate :href="route('user.edit', $college->id)" />
                <x-table.delete wire:click="deleteCollege({{ $college->id }})" />
                {{-- <x-table.view/> --}}
                {{-- <x-table.hide/> --}}
                {{-- <x-table.archive/> --}}
                {{-- <x-table.restore/> --}}
                {{-- <x-table.active/> --}}
                {{-- <x-table.inactive/> --}}
                {{-- <x-table.download> Download</x-table.download> --}}

              </x-table.td>
            </x-table.tr>
          @empty
            <x-table.tr>
              <x-table.td colSpan='8'>No Data Found</x-table.td>
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
