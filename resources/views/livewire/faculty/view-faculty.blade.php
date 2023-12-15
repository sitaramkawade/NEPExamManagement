<div>

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
                    @foreach ($faculties as $faculty )
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
    </div>
</div>
