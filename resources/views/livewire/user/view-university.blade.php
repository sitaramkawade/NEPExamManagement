


<div class="p-5">
<x-card heading="All Colleges"/>
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
            <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
            
            <x-table.th wire:click="sort_column('university_name')" name="university_name" :sort="$sortColumn" :sort_by="$sortColumnBy">University Name </x-table.th>
            <x-table.th wire:click="sort_column('university_email')" name="university_email" :sort="$sortColumn" :sort_by="$sortColumnBy">University Email </x-table.th>
            <x-table.th wire:click="sort_column('university_address')" name="university_address" :sort="$sortColumn" :sort_by="$sortColumnBy">University Address</x-table.th>
            <x-table.th wire:click="sort_column('university_website_url')" name="university_website_url" :sort="$sortColumn" :sort_by="$sortColumnBy">University website url.</x-table.th> 
            <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
            <x-table.th> Action </x-table.th>
          </x-table.tr>
        </x-table.thead>
        <x-table.tbody>
          @foreach ($universities as $key => $university)
            <x-table.tr wire:key="{{ $university->id }}">
              <x-table.td>{{ $key+1 }}</x-table.td>
              <x-table.td>{{ $university->university_name }} </x-table.td>
               <x-table.td> {{ $university->university_email}} </x-table.td>
              <x-table.td> {{ $university->university_address }} </x-table.td>
              <x-table.td> {{ $university->university_website_url }} </x-table.td> 
               <x-table.td> {{ $university->status==0?"Inactive":"Active";}} </x-table.td>

              <x-table.td> 
                <x-table.edit wire:navigate :href="route('user.editUniversity',$university->id)"/>
                <x-table.delete wire:click="deleteUniversity({{$university['id']}})"/>
              
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



