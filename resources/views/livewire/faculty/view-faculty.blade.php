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
                    <th>srno</th>
                    <th>id</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Mobile No</th>
                    <th>Action</th>
                    <!-- ... -->

                    <!-- Pass your table body content as a variable -->
                </tr>
            @endslot
            @slot('body')
                @foreach ($faculties as $key => $item)
                    <tr class="text-center odd:bg-white even:bg-slate-50">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->faculty_name }}</td>
                        <td>{{ $item->role->role_name ?? '' }}</td>
                        <td>{{ $item->mobile_no }}</td>
                        <td class="flex justify-center lg:justify-center md:justify-center space-x-1">
                            @if ($item->deleted_at)
                                {{-- For edit --}}
                                <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('faculty.edit.faculty', $item->id)" :text="'Edit'" />
                                {{-- For restore --}}
                                <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('faculty.restore.faculty', $item->id)" :text="'Restore'" />
                            @else
                                {{-- For edit --}}
                                <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('faculty.edit.faculty', $item->id)" :text="'Edit'" />
                                {{-- For soft delete --}}
                                <x-custom-button class="md:w-auto md:h-auto hover:bg-slate-200" :href="route('faculty.delete.faculty', $item->id)" :text="'delete'" />
                            @endif
                        </td>
                        <!-- ... -->
                    </tr>
                @endforeach
                <!-- ... -->
            @endslot
        </x-table>
    </div>
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
</div>
