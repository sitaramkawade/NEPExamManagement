<div>
    <div class="m-2 pb-3 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
        <div class="px-2 py-2 font-semibold text-white dark:text-light bg-primary">
            All Faculties
        </div>
        {{--
    <div class="p-5 bg-gray-100">
        <h1 class="text-xl mb-2">Faculty</h1>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Id</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Name</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Designation</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Mobile No</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($faculties as $faculty)
                    <tr class="bg-white">
                        <td class="p-3 text-sm text-gray-700"><a href="#" class="font-bold text-blue-500 hover:underline">{{ $faculty->id}}</a></td>
                        <td class="p-3 text-sm text-gray-700">{{ $faculty->faculty_name}}</td>
                        <td class="p-3 text-sm text-center text-gray-700">
                            {{ $faculty->role->role_name??'' }}
                        </td>
                        <td class="p-3 text-sm text-center text-gray-700">
                            <a href="#" class="font-bold text-blue-500 hover:underline">{{ $faculty->mobile_no}}</a>
                        </td>
                        <td class="p-3 text-center text-sm text-gray-700">
                            <button class="p-2 text-xs font-medium uppercase tracking-wider text-white bg-blue-600 rounded-lg">Edit</button>
                            <button class="p-2 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}

        <x-table class="p-1">
            @slot('head')
                <tr class="text-center">
                    <!-- Pass your table headers as a variable -->
                    <th>Id</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Mobile No</th>
                    <th>Action</th>
                    <!-- ... -->

                    <!-- Pass your table body content as a variable -->
                </tr>
            @endslot
            @slot('body')
                @foreach ($faculties as $faculty)
                    <tr class="text-center odd:bg-white even:bg-slate-50">
                        <td>{{ $faculty->id }}</td>
                        <td>{{ $faculty->faculty_name }}</td>
                        <td>{{ $faculty->role->role_name ?? '' }}</td>
                        <td>{{ $faculty->mobile_no }}</td>
                        <td class="flex justify-center lg:justify-center md:justify-center space-x-1">
                            {{-- for edit --}}
                            <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" href="{{ route('faculty.edit.faculty') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </x-custom-button>
                            {{-- for soft delete --}}
                            <x-custom-button class="md:w-auto md:h-auto hover:bg-yellow-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </x-custom-button>
                            {{-- for delete --}}
                            <x-custom-button class="md:w-auto md:h-auto hover:bg-red-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </x-custom-button>
                        </td>
                        <!-- ... -->
                    </tr>
                @endforeach
                <!-- ... -->
            @endslot
        </x-table>
    </div>

</div>
