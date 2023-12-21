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
            @foreach ($colleges as $key => $item)
                <tr class="text-center odd:bg-white even:bg-slate-50">
                    <td>{{ $key + 1 }}</td>
                    <td>{{$item->id}}</td>
                    <td>{{ $item->college_name}}</td>
                    <td>{{ $item->college_email}}</td>
                    <td>{{ $item->college_address }}</td>
                    <td>{{ $item->college_contact_no}}</td>
                    <td class="flex justify-center lg:justify-center md:justify-center space-x-1">
                        {{-- for edit --}}
                        <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('user.edit',$item->id)" :text="'Edit'" />
                        {{-- for soft delete --}}
                        <!-- {{-- <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('faculty.delete.faculty', $item->id)" :text="'Delete'" /> --}} -->
                    </td>
                    <!-- ... -->
                </tr>
            @endforeach
            <!-- ... -->
        @endslot

        </x-table>
    </div>

</div>




