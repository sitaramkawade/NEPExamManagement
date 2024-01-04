<x-student-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Address') }}
        </h2>



    </x-slot>


    <x-slot name="sidebar">
        <nav class="  pt-4 mx-1 ">


            <div class="  ">
                @if (Auth::user()->studentaddress->count() !== 2)
                    <x-sidebar-nav-link :href="route('student.AddressDetails.create')" :active="request()->routeIs('student.AddressDetails.create')">
                        {{ __('Add Address') }}
                    </x-sidebar-nav-link>
                @endif
            </div>

            <div class="  ">
                @if (Auth::user()->studentaddress->count() !== 0)
                    <x-sidebar-nav-link :href="route('student.AddressDetails.index')" :active="request()->routeIs('student.AddressDetails.index')">
                        {{ __('Show Address') }}

                    </x-sidebar-nav-link>
                @endif
            </div>



        </nav>

    </x-slot>

    <div class="py-2 px-1">



        <div class="p-3  sm:px-6 sm:py-4 bg-white dark:bg-gray-800 shadow rounded-md">
            <div class=" max-w-full  " x-data={open:true}>
                <div class=" flex   justify-between   ">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Previous Education Details') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __(' मागील  शैक्षणिक तपशील') }}
                        </p>
                    </header>
                    <button @click="open = !open" class=" bg-gray  	">

                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                        </svg>


                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>


                    </button>
                </div>
                 
         
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
          @php
           $test=$errors->all();   
          @endphp
                <section x-show="open" x-collapse.duration.500ms>
                    <form action="{{ route('student.EducationDetails.store') }}" method="POST">
                        @csrf
                        <livewire:student.education  :test="$errors->all()"  />
                      <div class=" flex justify-end content-center items-center bg-slate-200 px-10 py-1 rounded shadow-sm">
                        <input   class=" mr-6  text-white bg-gray-700 hover:bg-gray-400
                        focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium 
                        rounded-lg text-sm px-5 py-2 text-center inline-flex items-center 
                         " type="submit" value="Submit">
                      </div>
                    </form>

                </section>




            </div>

           
        </div>
   
        @if(!$studenteducations->isEmpty())
        <div class="p-3 mt-3  sm:px-6 sm:py-4 bg-white dark:bg-gray-800 shadow rounded-md">
            <div class=" max-w-full  " x-data={open:true}>
                <div class=" flex   justify-between   ">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Previous Education Details') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __(' मागील  शैक्षणिक तपशील') }}
                        </p>
                    </header>
                    <button @click="open = !open" class=" bg-gray  	">

                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                        </svg>


                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>


                    </button>
                </div>

                <section x-show="open" x-collapse.duration.500ms>
                    <div class=" flex-none md:flex  space-x-6   py-4 overflow-scroll">
                        <x-table>
                            <x-slot name="head">
                                <x-tables.row>

                                    <x-tables.heading> Course
                                    </x-tables.heading>
                                    <x-tables.heading> Passing Year
                                    </x-tables.heading>
                                    <x-tables.heading> Seat No
                                    </x-tables.heading>
                                    <x-tables.heading> Obtained Marks
                                    </x-tables.heading>
                                    <x-tables.heading> Total Marks
                                    </x-tables.heading>
                                    <x-tables.heading> Percentage
                                    </x-tables.heading>
                                    <x-tables.heading> CGPA
                                    </x-tables.heading>
                                    <x-tables.heading> GRADE
                                    </x-tables.heading>
                                    <x-tables.heading> Action
                                    </x-tables.heading>
                                </x-tables.row>
                            </x-slot>
                            <x-slot name="body">

                                @forelse($studenteducations as $studenteducation)
                                    <x-tables.row>
                                        <x-tables.cell class="text-center">
                                            {{ $studenteducation->educationalcourse->course_name }} </x-tables.cell>
                                        <x-tables.cell class="text-center">
                                            {{ $studenteducation->passing_year->format('M-Y') }} </x-tables.cell>
                                        <x-tables.cell class="text-center"> {{ $studenteducation->seat_number }}
                                        </x-tables.cell>
                                        <x-tables.cell class="text-center">{{ $studenteducation->obtained_marks }}
                                        </x-tables.cell>
                                        <x-tables.cell class="text-center"> {{ $studenteducation->total_marks }}
                                        </x-tables.cell>
                                        <x-tables.cell class="text-center"> {{ $studenteducation->percentage }}
                                        </x-tables.cell>
                                        <x-tables.cell class="text-center"> {{ $studenteducation->cgpa }}
                                        </x-tables.cell>
                                        <x-tables.cell class="text-center"> {{ $studenteducation->grade }}
                                        </x-tables.cell>
                                        <x-tables.cell class="text-center">
                                            <form method="POST"
                                                action="{{ route('student.EducationDetails.destroy', $studenteducation->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" title="submit"
                                                    class="    text-white bg-red-700 hover:bg-red-400
                             focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium 
                             rounded-lg text-sm px-5 py-2 text-center inline-flex items-center 
                              ">
                                                    Delete
                                                </button>
                                            </form>

                                        </x-tables.cell>
                                    </x-tables.row>
                                @empty
                                    <x-tables.row>
                                        <x-tables.cell colspan="5">
                                            <div
                                                class=" flex justify-center bg-slate-100 py-6 font-semibold rounded-sm shadow-sm items-center text-xl  ">
                                                No Data Found .....</div>
                                        </x-tables.cell>
                                    </x-tables.row>
                                @endforelse
                            </x-slot>
                        </x-table>
                    </div>
                </section>




            </div>


        </div>
         @endif




    </div>



</x-student-layout>
