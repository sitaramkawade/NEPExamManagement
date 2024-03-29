<div class="p-5">
  {{ $d_id }}
  @livewire('select-to' ,['table'=>'districts','key'=>'id','value'=>'district_name'])
  <x-table.frame>
    <x-slot:body>
      <x-table.table>
        <x-table.thead>
          <x-table.tr>
            <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
            <x-table.th wire:click="sort_column('district_code')" name="district_code" :sort="$sortColumn" :sort_by="$sortColumnBy">Code </x-table.th>
            <x-table.th wire:click="sort_column('district_name')" name="district_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Name </x-table.th>
            <x-table.th wire:click="sort_column('state_id')" name="state_id" :sort="$sortColumn" :sort_by="$sortColumnBy">State</x-table.th>
            <x-table.th > Action </x-table.th>
          </x-table.tr>
        </x-table.thead>
        <x-table.tbody>
          @foreach ($data as $item)
            <x-table.tr wire:key="{{ $item->id }}">
              <x-table.td>{{ $item->id }}</x-table.td>
              <x-table.td>{{ $item->district_code }} </x-table.td>
              <x-table.td>{{ $item->district_name }} </x-table.td>
              <x-table.td>{{ $item->state->state_name }} </x-table.td>
              <x-table.td> 
                <x-table.edit/>
                <x-table.delete/>
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
