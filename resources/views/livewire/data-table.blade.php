<div class="p-5">
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
            <x-table.th wire:click="sort_column('districts.id')" name="districts.id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
            <x-table.th wire:click="sort_column('districts.district_code')" name="districts.district_code" :sort="$sortColumn" :sort_by="$sortColumnBy">Code </x-table.th>
            <x-table.th wire:click="sort_column('districts.district_name')" name="districts.district_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Name </x-table.th>
            <x-table.th wire:click="sort_column('states.state_name')" name="states.state_name" :sort="$sortColumn" :sort_by="$sortColumnBy">State</x-table.th>
            <x-table.th> Action </x-table.th>
          </x-table.tr>
        </x-table.thead>
        <x-table.tbody>
          @foreach ($data as $key => $item)
            <x-table.tr wire:key="{{ $item->id }}">
              <x-table.td>{{ $key+1 }}</x-table.td>
              <x-table.td>{{ $item->district_code }} </x-table.td>
              <x-table.td> {{ $item->district_name }} </x-table.td>
              <x-table.td> {{ $item->state->state_name }} </x-table.td>
              <x-table.td> 
                <x-table.edit/>
                <x-table.delete/>
                <x-table.view/>
                <x-table.hide/>
                <x-table.archive/>
                <x-table.restore/>
                <x-table.active/>
                <x-table.inactive/>
                <x-table.download> Download</x-table.download>
                
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