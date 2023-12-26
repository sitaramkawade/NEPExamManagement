<div>
    <div class="m-2 pb-3 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
        <div class="px-2 py-2 font-semibold text-white dark:text-light bg-primary">
            All Colleges
        </div>


        <x-table class="p-1">
            @slot('head')
                <tr class="text-center">
                    <!-- Pass your table headers as a variable -->
                    <th>srno</th>
                    <th>ID</th>
                    <th>College Name</th>
                    <th>College Email</th>
                    <th>College Address</th>
                    <th>College Contact no.</th>
                    <th>Action</th>
                    <!-- ... -->

                    <!-- Pass your table body content as a variable -->
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
                        {{-- for edit --}}
                        <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('user.edit',$college->id)" :text="'Edit'" />
                        {{-- for  delete --}}
                        <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" href="javascript:void(0)" wire:click="deleteCollege({{$college['id']}})" :text="'Delete'" />
                    <!-- ... -->
                </tr>
            @endforeach
            <!-- ... -->
        @endslot
  
        </x-table>
     
        {{ $colleges->links() }}
    
    </div>

</div>




