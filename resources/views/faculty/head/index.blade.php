<x-faculty-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Faculty in Department!!!') }}



        </h2>
    </x-slot>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('admin.head.addfaculty') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add New Faculty</a>
            </div>
           


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                @if (@isset($user))


                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">



                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Sr.No.
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    User Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Department
                                                </th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Roles
                                                </th>


                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ACTION
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white divide-y divide-gray-200">
                                          
                                            @foreach ($user as $value)
                                                <tr>
                                                    <td class="px-6 py-2 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $value->id??"" }}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class=" px-6   whitespace-nowrap text-sm text-gray-500">
                                                            {{ $value->name??"" }}</div>

                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class=" px-6   whitespace-nowrap text-sm text-gray-500">
                                                            
                                                            {{$value->department->dept_name??""}}
                                                           
                                                        </div>


                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class=" px-6   whitespace-nowrap text-sm text-gray-500">
                                                            
                                                        {{ $value->role->role_name??"" }}
                                                           
                                                        </div>


                                                    </td>
                                                   
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('admin.head.editfaculty', $value->id) }}">
                                                    <button value="Edit" 
                                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">
                                                               Edit
                                                            </button></a>


                                                        
                                                        <form class="inline-block"
                                                            action="{{ route('admin.head.deletefaculty', $value->id) }}"
                                                            method="POST" onsubmit="return confirm('Are you sure?');">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="submit"
                                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded"
                                                                value="Delete" >
                                                        </form>
                                                        <a href="{{ route('admin.head.showalldetails', $value->id) }}">
                                                            <button value="View" 
                                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                                                               View
                                                            </button></a>
                                                    </td>


                                                </tr>

                                                <!-- More people... -->
                                        </tbody>
                                @endforeach
                                </table>
                             
                                {{-- {!! $courses->render() !!} --}}
                           
                             
                                @endif
                                {{-- {{ $courses->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    

</x-faculty-layout>