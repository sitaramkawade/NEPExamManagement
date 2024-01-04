<x-faculty-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subject !!!') }}



        </h2>
    </x-slot>
    <div class="py-12 ">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    @if (session('success'))
                    <div class="text-center m-1 bg-red-300  h-10 px-2 py-1 shadow rounded text-2xl  ">
                        {{session('success')}}
                    </div>
                    @endif
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        @if (@isset($head_department_ids))
                        @foreach ($head_department_ids as $department_id)
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="m-10 shadow-md rounded-lg px-3 py-4 overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                @if (@isset($subjects))

                                <div class="block mb-8">
                                    <a href="{{ route('admin.subject.addsubject',$department_id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add New Subject</a>

                                    <a href="{{ route('admin.subject.addsubjectbucket',$department_id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Subject in Bucket</a>
                                </div>
                                <div class="block mb-8">
                                    {{Auth::user()->name ." (".Auth::user()->getdepartment($department_id).") : Head Of the Department "}}
                                </div>
                                <table class="min-w-full  divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Sr.No.
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Subject Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Subject Category
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Credit
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Pattern-Class
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Department
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ACTION
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200">

                                        @foreach ($subjects->where('department_id',$department_id)->sortByDesc('patternclass_id') as $subject)
                                        <tr>
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="flex items-center">

                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $subject->id??"" }}
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class=" px-6   whitespace-nowrap text-sm text-gray-500">
                                                    {{ $subject->subject_name??"" }}

                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class=" px-6   whitespace-nowrap text-sm text-gray-500">

                                                    {{$subject->subjectcategories->subjectcategory??""}}

                                                </div>


                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class=" px-6   whitespace-nowrap text-sm text-gray-500">

                                                    {{ $subject->subject_credit??"" }}

                                                </div>


                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class=" px-6   whitespace-nowrap text-sm text-gray-500">
                                                @if(!is_null($subject->patternclass_id) && is_null($subject->classyear_id))
                                                    {{ strtoupper($subject->patternclass->courseclass->classyear->classyear_name??"") }}{{ strtoupper($subject->patternclass->courseclass->course->course_name??"") }}{{ strtoupper($subject->patternclass->pattern->pattern_name??"") }}
                                                @else  @if(is_null($subject->patternclass_id) && !is_null($subject->classyear_id))
                                                    {{ strtoupper($subject->classyear->classyear_name??"") }}
                                                @endif @endif
                                                </div>


                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class=" px-6   whitespace-nowrap text-sm text-gray-500">

                                                    {{ $subject->department->dept_name??"" }}

                                                </div>


                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <div>
                                                    @if($subject->status==1)
                                                    <a href="{{ route('admin.subject.activesubject', $subject->id) }}">
                                                        <button class=" px-6   whitespace-nowrap text-sm {{ $subject->status==1? "bg-green-600 hover:bg-green-400":"bg-red-700 hover:bg-red-400" }} text-white text-center font-semibold  py-2 rounded-full">
                                                            {{ "Active" }}
                                                        </button></a>
                                                    @else @if($subject->active==0)
                                                    <a href="{{ route('admin.subject.deactivesubject', $subject->id) }}">
                                                        <button class=" px-6   whitespace-nowrap text-sm {{ $subject->status==1? "bg-green-600 hover:bg-green-400":"bg-red-700 hover:bg-red-400" }} text-white text-center font-semibold  py-2 rounded-full">

                                                            {{ "InActive" }}
                                                        </button></a>
                                                    @endif @endif


                                                </div>


                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('admin.subject.editsubject', $subject->id) }}">
                                                    <button value="Edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">
                                                        Edit
                                                    </button></a>


                                                @if($subject->status==1)
                                                <form class="inline-block" action="{{ route('admin.subject.deletesubject', $subject->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded" value="Delete">
                                                </form>
                                                @else
                                                <input type="submit" disabled class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-gray-700 rounded" value="Delete">
                                                @endif
                                                <a href="{{ route('admin.subject.showalldetailssubject', $subject->id) }}" target="_blank">
                                                    <button value="View" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
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
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- {{ $courses->links() }} --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
     


</x-faculty-layout>