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
                            {{ __('Personal Details') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __(' वैयक्तिक  तपशील') }}
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
                    $test = $errors->all();
                @endphp
                <section x-show="open" x-collapse.duration.500ms>
                    <form action="{{ route('student.EducationDetails.store') }}" method="POST">
                        @csrf
                        <div>
                            <div class=" flex-none md:flex  space-x-6   py-4">
                                <div class="  flex-1 space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="student_name_devnagari" :value="__('देवनागरीतील विद्यार्थ्याचे नाव ')" />
                                            <x-text-input id="student_name_devnagari" class="block mt-1 w-full" type="text"
                                                name="student_name_devnagari" :value="old('student_name_devnagari')" required autofocus
                                                autocomplete="student_name_devnagari" placeholder="विद्यार्थ्याचे नाव" />
                                            <x-input-error :messages="$errors->get('student_name_devnagari')" class="mt-2" />
                                        </div>
                                    </div>                                  
                                </div>
                                <div class="  flex-1 space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="mother_name_devnagari" :value="__('देवनागरीत आईचे नाव ')" />
                                            <x-text-input id="mother_name_devnagari" class="block mt-1 w-full" type="text"
                                                name="mother_name_devnagari" :value="old('mother_name_devnagari')" required autofocus
                                                autocomplete="mother_name_devnagari" placeholder="आईचे नाव" />
                                            <x-input-error :messages="$errors->get('mother_name_devnagari')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-1   space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="father_name_devnagari" :value="__('वडिलांचे नाव देवनागरी')" />
                                            <x-text-input id="father_name_devnagari" class="block mt-1 w-full" type="text"
                                                name="father_name_devnagari" :value="old('father_name_devnagari')" required autofocus
                                                autocomplete="father_name_devnagari" placeholder="वडिलांचे नाव " />
                                            <x-input-error :messages="$errors->get('father_name_devnagari')" class="mt-2" />
                                        </div>

                                    </div>
                                </div>

                                
                            </div>

 {{-- Second Row --}}
                            <div class=" flex-none md:flex  space-x-6   py-4">
                                <div class="  flex-1 space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="parent_name" :value="__(' Guardian name /Parent Name ')" />
                                            <x-text-input id="parent_name" class="block mt-1 w-full" type="text"
                                                name="parent_name" :value="old('parent_name')" required autofocus
                                                autocomplete="parent_name" placeholder="Enter Guardian name /Parent Name" />
                                            <x-input-error :messages="$errors->get('parent_name')" class="mt-2" />
                                        </div>
                                    </div>                                  
                                </div>
                                <div class="  flex-1 space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="parent_mobile_no" :value="__('Guardian /Parent Mobile No. ')" />
                                            <x-text-input id="parent_mobile_no" class="block mt-1 w-full" type="text"
                                                name="parent_mobile_no" :value="old('parent_mobile_no')" required autofocus
                                                autocomplete="parent_mobile_no" placeholder="Guardian /Parent Mobile No." />
                                            <x-input-error :messages="$errors->get('parent_mobile_no')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="flex-1   space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="gender" :value="__('Gender')" />
                                            <x-input-select class="block mt-1 w-full"  >
                                            @foreach(Genders() as $key => $value)   
                                            <option value="{{$value->gender_shortform}}">{{$value->gender}}</option>
                                            @endforeach
                                        </x-input-select>
                                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                        </div>

                                    </div>
                                </div>

                                
                            </div>

                            <div class=" flex-none md:flex  space-x-6   py-4">
                                <div class="  flex-1 space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="date_of_birth" :value="__('Date of Birth ')" />
                                            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date"
                                                name="date_of_birth" :value="old('date_of_birth')" required autofocus
                                                autocomplete="date_of_birth" placeholder="Enter Date of Birth" />
                                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                                        </div>
                                    </div>                                  
                                </div>
                                <div class="  flex-1 space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="nationality" :value="__('Nationality ')" />
                                            <x-text-input id="nationality" class="block mt-1 w-full" type="text"
                                                name="nationality" :value="old('nationality')" required autofocus
                                                autocomplete="nationality" placeholder="Enter Nationality" />
                                            <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-1   space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="caste_id" :value="__('Father Caste')" />
                                            <x-text-input id="caste_id" class="block mt-1 w-full" type="text"
                                                name="caste_id" :value="old('caste_id')" required autofocus
                                                autocomplete="caste_id" placeholder="Enter Father Full Name" />
                                            <x-input-error :messages="$errors->get('caste_id')" class="mt-2" />
                                        </div>

                                    </div>
                                </div>

                                
                            </div>

                            <div class=" flex-none md:flex  space-x-6   py-4">
                                <div class="  flex-1 space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="caste_category_id" :value="__('Category ')" />
                                            <x-text-input id="caste_category_id" class="block mt-1 w-full" type="text"
                                                name="caste_category_id" :value="old('caste_category_id')" required autofocus
                                                autocomplete="caste_category_id" placeholder="Category" />
                                            <x-input-error :messages="$errors->get('caste_category_id')" class="mt-2" />
                                        </div>
                                    </div>                                  
                                </div>
                                <div class="  flex-1 space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="is_noncreamylayer" :value="__('is_noncreamylayer ')" />
                                            <x-text-input id="is_noncreamylayer" class="block mt-1 w-full" type="text"
                                                name="is_noncreamylayer" :value="old('is_noncreamylayer')" required autofocus
                                                autocomplete="is_noncreamylayer" placeholder="आईचे नाव" />
                                            <x-input-error :messages="$errors->get('is_noncreamylayer')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-1   space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="is_minority" :value="__('is_minority')" />
                                            <x-text-input id="is_minority" class="block mt-1 w-full" type="text"
                                                name="is_minority" :value="old('is_minority')" required autofocus
                                                autocomplete="is_minority" placeholder="Enter Father Full Name" />
                                            <x-input-error :messages="$errors->get('is_minority')" class="mt-2" />
                                        </div>

                                    </div>
                                </div>

                                
                            </div>



                        </div>

                        <div
                            class=" flex justify-end content-center items-center bg-slate-200 px-10 py-1 rounded shadow-sm">
                            <input
                                class=" mr-6  text-white bg-gray-700 hover:bg-gray-400
                        focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium 
                        rounded-lg text-sm px-5 py-2 text-center inline-flex items-center 
                         "
                                type="submit" value="Submit">
                        </div>
                    </form>

                </section>




            </div>


        </div>

       
           


            
         
    </div>
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
                    $test = $errors->all();
                @endphp
                <section x-show="open" x-collapse.duration.500ms>
                    <form action="{{ route('student.EducationDetails.store') }}" method="POST">
                        @csrf
                        <div>
                            <div class=" flex-none md:flex  space-x-6   py-4">
                                <div class="  flex-1 space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="is_handicap" :value="__('is_handicap Name ')" />
                                            <x-text-input id="is_handicap" class="block mt-1 w-full" type="text"
                                                name="is_handicap" :value="old('is_handicap')" required autofocus
                                                autocomplete="is_handicap" placeholder="Enter Last Name" />
                                            <x-input-error :messages="$errors->get('is_handicap')" class="mt-2" />
                                        </div>


                                    </div>


                                </div>
                                <div class="  flex-1 space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="maritalstatus_id" :value="__('Mother Name ')" />
                                            <x-text-input id="maritalstatus_id" class="block mt-1 w-full" type="text"
                                                name="maritalstatus_id" :value="old('maritalstatus_id')" required autofocus
                                                autocomplete="maritalstatus_id" placeholder="Enter Last Name" />
                                            <x-input-error :messages="$errors->get('maritalstatus_id')" class="mt-2" />
                                        </div>


                                    </div>


                                </div>

                                <div class="flex-1   space-y-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div>
                                            <x-input-label for="migratestud" :value="__('migratestud')" />
                                            <x-text-input id="migratestud" class="block mt-1 w-full" type="text"
                                                name="migratestud" :value="old('migratestud')" required autofocus
                                                autocomplete="migratestud" placeholder="Enter Last Name" />
                                            <x-input-error :messages="$errors->get('migratestud')" class="mt-2" />
                                        </div>

                                    </div>
                                </div>

                              
                            </div>


                            <div class=" flex-none  space-x-6 md:flex   py-4">
                               
                                <div class="flex-1   space-y-6">
                                    <div class="flex-1   space-y-6">

                                        <x-input-label for="profile_photo_path" :value="__('profile_photo_path')" />
                                        <x-text-input id="profile_photo_path" required type="text" class="mt-2 block w-full"
                                            name="profile_photo_path" autocomplete="profile_photo_path" />
                                        <x-input-error :messages="$errors->get('profile_photo_path')" class="mt-2" />

                                    </div>

                                </div>
                               

                                <div class="flex-1   space-y-6">
                                    <div class="flex-1   space-y-6">

                                        <x-input-label for="sign_photo_path" :value="__('sign_photo_path')" />
                                        <x-text-input id="sign_photo_path" required type="text" class="mt-2 block w-full"
                                            name="sign_photo_path" autocomplete="sign_photo_path" />
                                        <x-input-error :messages="$errors->get('sign_photo_path')" class="mt-2" />

                                    </div>
                                </div>
                            </div>

                            



                        </div>
                        @foreach(  Genders()  as $master)
                        {{$master}}
                        @endforeach
                        <div
                            class=" flex justify-end content-center items-center bg-slate-200 px-10 py-1 rounded shadow-sm">
                            <input
                                class=" mr-6  text-white bg-gray-700 hover:bg-gray-400
                        focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium 
                        rounded-lg text-sm px-5 py-2 text-center inline-flex items-center 
                         "
                                type="submit" value="Submit">
                        </div>
                    </form>

                </section>




            </div>


        </div>

       
          
         
    </div>




</x-student-layout>
