<div>
    {{-- <x-breadnav aria-label="Breadcrumb">
        <x-breadol>
            <x-breadli>
                <x-breadanchor href="/" text="Home">
                    <x-breadsvg>
                        <x-breadsvgpath />
                    </x-breadsvg>
                </x-breadanchor>
            </x-breadli>
        </x-breadol>
    </x-breadnav> --}}
 <x-container heading="All Faculties">
   
        <x-slot name="slot">
            <x-container-btn class="bg-green-500 hover:bg-green-600" href="{{ route('faculty.register.faculty') }}">
                <x-slot name="svg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                </x-slot>
                <x-slot name="btntext">
                    Add
                </x-slot>
            </x-container-btn>
        </x-slot>
        <x-slot name="content">
            <x-table>
                <x-slot name="head">
                    <tr class="text-center">
                        <th>srno</th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Mobile No</th>
                        <th>Action</th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach ($faculties as $key => $item)
                        <tr class="text-center odd:bg-white even:bg-slate-50">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->faculty_name }}</td>
                            <td>{{ $item->role->role_name ?? '' }}</td>
                            <td>{{ $item->mobile_no }}</td>
                            <td class="flex justify-center lg:justify-center md:justify-center space-x-1">
                                @if ($item->deleted_at)
                                    <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('faculty.edit.faculty', $item->id)" :text="'Edit'" />
                                    <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('faculty.restore.faculty', $item->id)" :text="'Restore'" />
                                @else
                                    <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('faculty.edit.faculty', $item->id)" :text="'Edit'" />
                                    <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('faculty.delete.faculty', $item->id)" :text="'delete'" />
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>
        </x-slot>
    </x-container>
</div>
