<div class="p-5">
  <x-card-header href="{{ route('user.addSanstha') }}">
                        All Sansthas
                        <x-slot name="svg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 mr-1 mt-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                            </svg>
                        </x-slot>
                        <x-slot name="btntext">Add</x-slot>
                    </x-card-header>

    <x-table.frame>
        <x-slot:header>

            </x-slot>

            <x-slot:body>
                <x-table.table>
                    <x-table.thead>
                        <x-table.tr>
                            <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>

                            <x-table.th wire:click="sort_column('sanstha_name')" name="sanstha_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Sanstha Name </x-table.th>
                            <x-table.th wire:click="sort_column('sanstha_chairman_name')" name="sanstha_chairman_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Sanstha Chairman Name </x-table.th>
                            <x-table.th wire:click="sort_column('sanstha_address')" name="sanstha_address" :sort="$sortColumn" :sort_by="$sortColumnBy">Sanstha Address</x-table.th>
                            <x-table.th wire:click="sort_column('sanstha_contact_no')" name="sanstha_contact_no" :sort="$sortColumn" :sort_by="$sortColumnBy">Sanstha Contact No.</x-table.th>
                            <x-table.th wire:click="sort_column('sanstha_website_url')" name="sanstha_website_url" :sort="$sortColumn" :sort_by="$sortColumnBy">Sanstha website url.</x-table.th>
                            <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
                            <x-table.th> Action </x-table.th>
                        </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                        @forelse ($sansthas as $key => $sanstha)
                        <x-table.tr wire:key="{{ $sanstha->id }}">
                            <x-table.td>{{ $key+1 }}</x-table.td>
                            <x-table.td class="text-pretty">{{ $sanstha->sanstha_name }} </x-table.td>
                            <x-table.td>{{ $sanstha->sanstha_chairman_name }} </x-table.td>
                            <x-table.td> {{ $sanstha->sanstha_address }} </x-table.td>
                            <x-table.td> {{ $sanstha->sanstha_contact_no }} </x-table.td>
                            <x-table.td> {{ $sanstha->sanstha_website_url }} </x-table.td>
                            <x-table.td> {{ $sanstha->status==0?"Inactive":"Active";}} </x-table.td>

                            <x-table.td>
                                <x-table.edit wire:navigate :href="route('user.editSanstha',$sanstha->id)" />
                                <x-table.delete wire:click="deleteSanstha({{$sanstha['id']}})" />

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
                    <x-table.paginate :data="$patterns" />
                    </x-slot>
    </x-table.frame>

</div>