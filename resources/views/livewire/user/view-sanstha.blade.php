<div class="p-5">
    <x-card heading="All Sanstha" />
    <x-table.frame>
        <x-slot:header>
            <x-table.perpage />
            <x-table.search />
            <x-spinner />
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
                        @foreach ($sansthas as $key => $sanstha)
                        <x-table.tr wire:key="{{ $sanstha->id }}">
                            <x-table.td>{{ $key+1 }}</x-table.td>
                            <x-table.td>{{ $sanstha->sanstha_name }} </x-table.td>
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
                        @endforeach
                    </x-table.tbody>
                </x-table.table>
                </x-slot>
                <x-slot:footer>
                    <x-table.paginate :data="$data" />
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
                @foreach ($sansthas as $key => $sanstha)
                <tr class="text-center odd:bg-white even:bg-slate-50">
                    <td>{{ $key + 1 }}</td>
<td>{{ $sanstha->id }}</td>
<td>{{ $sanstha->sanstha_name }}</td>
<td>{{ $sanstha->sanstha_website_url }}</td>
<td>{{ $sanstha->sanstha_address }}</td>
<td>{{ $sanstha->sanstha_contact_no}}</td>
<td class="flex justify-center lg:justify-center md:justify-center space-x-1">

    <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" href="#" />

    <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" href="javascript:void(0)" wire:click="deleteCollege({{$college['id']}})" :text="'Delete'" />

    </tr>
    @endforeach

    @endslot

    </x-table>

    {{ $colleges->links() }}

    </div>

    </div> --}}
