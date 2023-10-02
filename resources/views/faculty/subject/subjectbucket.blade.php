<x-faculty-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Subject Bucket!!!') }}



        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                        <div class="py-2   align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="m-10 shadow-md rounded-lg px-3 py-4 overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="block mb-8">
                                    <a href="{{ route('admin.subject.showsubject') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Back </a>
                                </div>

                                <div>{{"Department : ".$dept->first()->dept_name}}</div>
                                <form method="POST" action="{{ route('admin.subject.storesubjectbucket',$dept->first()->id) }}">
                                    @csrf
                                    <div>
                                        @livewire('dropdown.patternclassbucket',['deptid'=>$dept->first()->id])
                                    </div>
                                            <div>
                                            <x-input-label for="subject_categoryno" value="{{ __('Subject category Number') }}" />
                                                        <select id="subject_categoryno" class="block mt-1 w-full rounded" name="subject_categoryno">
                                                            @for($i=1;$i<=6;$i++) <option  value="{{$i}}"> {{$i}} </option>
                                                            @endfor 
                                        
                                                        </select>
                                            <x-input-error :messages=" $errors->get('subject_categoryno')" class="mt-2" />
                                                   
                                            </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ml-4">
                                            {{ __('Add Subject') }}
                                        </x-primary-button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-faculty-layout>