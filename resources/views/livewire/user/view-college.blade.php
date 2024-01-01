


<div class="p-5">
<x-card-header > All Colleges
 <x-slot name="svg">
            <x-add-btn href="{{ route('user.college') }}"/>
        </x-slot>
        </x-card-header>

  <x-table.frame>
    <x-slot:header>
    
    </x-slot>
    
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
          @foreach ($colleges as $key => $college)
            <x-table.tr wire:key="{{ $college->id }}">
              <x-table.td>{{ $key+1 }}</x-table.td>
              <x-table.td>{{ $college->college_name }} </x-table.td>
              <x-table.td> {{ $college->college_email}} </x-table.td>
              <x-table.td> {{ $college->college_address }} </x-table.td>
              {{-- <x-table.td> {{ $college->college_contact_no }} </x-table.td>
              <x-table.td> {{ $college->college_website_url }} </x-table.td> --}}
              <x-table.td> {{ $college->sanstha->sanstha_name }} </x-table.td>
              <x-table.td> {{ $college->university->university_name }} </x-table.td>
              <x-table.td> {{ $college->status==0?"Inactive":"Active";}} </x-table.td>

              <x-table.td> 
                <x-table.edit wire:navigate :href="route('user.edit',$college->id)"/>
                <x-table.delete wire:click="deleteCollege({{$college['id']}})"/>
                {{-- <x-table.view/> --}}
                {{-- <x-table.hide/> --}}
                {{-- <x-table.archive/> --}}
                {{-- <x-table.restore/> --}}
                {{-- <x-table.active/> --}}
                {{-- <x-table.inactive/> --}}
                {{-- <x-table.download> Download</x-table.download> --}}
                
              </x-table.td>
            </x-table.tr>
          @endforeach
        </x-table.tbody>
      </x-table.table>
    </x-slot>
    <x-slot:footer>
      <x-table.paginate :data="$colleges" />
    </x-slot>
  </x-table.frame>
 
</div>







{{-- <div>
    <div class="m-2 pb-3 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
        <div class="px-2 py-2 font-semibold text-white dark:text-light bg-primary">
            All Colleges
        </div>
        <x-table class="p-1">
            @slot('head')
                <tr class="text-center">
                   
                    <th>srno</th>
                    <th>ID</th>
                    <th>College Name</th>
                    <th>College Email</th>
                    <th>College Address</th>
                    <th>College Contact no.</th>
                    <th>Action</th>
                   
                   
                </tr>
            @endslot
            @slot('body')
            @foreach ($colleges as $key => $college)
                <tr class="text-center odd:bg-white even:bg-slate-50">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $college->id }}</td>
                    <td>{{ $college->college_name }}</td>
                    <td>{{ $college->college_email }}</td>
                    <td>{{ $college->college_address }}</td>
                    <td>{{ $college->college_contact_no}}</td>
                    <td class="flex justify-center lg:justify-center md:justify-center space-x-1">
                        
                        <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('user.edit',$college->id)" :text="'Edit'" />
                        
                        <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" href="javascript:void(0)" wire:click="deleteCollege({{$college['id']}})" :text="'Delete'" />
                   
                </tr>
            @endforeach
           
        @endslot
  
        </x-table>
     
        {{ $colleges->links() }}
    
    </div>

</div>

 --}}


