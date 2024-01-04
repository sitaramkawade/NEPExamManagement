<x-student-layout>   

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Address') }}
        </h2>
   
       

    </x-slot>


    <x-slot name="sidebar">
        <nav class="  pt-4 mx-1 ">    
 
             
            <div class="  ">  
                @if(Auth::user()->studentaddress->count()!==2)
                <x-sidebar-nav-link   :href="route('student.AddressDetails.create')" :active="request()->routeIs('student.AddressDetails.create')">
                    {{ __('Add Address') }} 
                </x-sidebar-nav-link> 
                @endif
            </div>
            
            <div class="  ">  
                @if(Auth::user()->studentaddress->count()!==0)
                <x-sidebar-nav-link  :href="route('student.AddressDetails.index')" :active="request()->routeIs('student.AddressDetails.index')">
                    {{ __('Show Address') }}
                    
                </x-sidebar-nav-link> 
                @endif
            </div>
         
           

        </nav>
      
    </x-slot>

    <div class="py-12">
       
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            <div class="   bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-7xl mx-auto sm:px-2 lg:px-2 space-y-2">
                        {{-- Correspondence Address --}}
                      
                        @foreach ( Auth::user()->studentaddress as $studentaddress)
                        
            
                        
                       
                            <div class="p-3  sm:px-6 sm:py-4 bg-white dark:bg-gray-800 shadow rounded-md">
                                <div class=" max-w-full  " x-data={open:true}>
                                    <div class=" flex   justify-between   ">
                                        <header>
                                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                {{ __($studentaddress->addresstype->type) }}
                                            </h2>
            
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                {{ __($studentaddress->addresstype->type_devnagari) }}
                                            </p>
                                        </header>
                                        <button @click="open = !open" class=" bg-gray  	">
            
                                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                            </svg>
            
            
                                            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
            
            
                                        </button>
                                    </div>
            
                                    <section x-show="open" x-collapse.duration.500ms>
            
                                        <div class=" flex-none md:flex   py-4">
                                            <div class="  flex-1 space-y-6">
                                                {{-- Left --}}
            
                                                <div class="max-w-2xl mx-auto">
                                                    <label for="countries"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                                                        Country </label>
                                                    <select
                                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                                                     
                                                        id="country" >
                                                        <option value="" selected readonly> {{$studentaddress->taluka->district->state->country->country_name}}</option>
            
                                                             
            
                                                    </select>
            
                                                </div>
                                                {{-- States --}}
                                                <div class="max-w-2xl mx-auto">
                                                    <label for="states"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                                                        State</label>
                                                    <select
                                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                                                       
                                                        id="state" readonly>
                                                        <option value=""> {{$studentaddress->taluka->district->state->state_name}}</option>
            
                                                        
            
                                                    </select>
            
                                                </div>
                                                {{-- Districts --}}
                                                <div class="max-w-2xl mx-auto">
                                                    <label for="districts"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                                                        District</label>
                                                    <select
                                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                                                       
                                                        id="district" readonly>
                                                        <option value=""> {{$studentaddress->taluka->district->district_name}}</option>
            
                                                    </select>
            
                                                </div>
                                                {{-- Taluka --}}
                                                <div class="max-w-2xl mx-auto">
                                                    <label for="talukas"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                                                        Taluka</label>
                                                    <select
                                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                                                       
                                                        id="c_taluka_id" readonly>
                                                        <option value=""> {{$studentaddress->taluka->taluka_name}}</option>
                                                       
            
                                                    </select>
            
                                                </div>
            
            
            
            
                                            </div>
                                            {{-- Right Part --}}
                                            <div class="flex-1 px-2 space-y-6">
            
                                                <div>
                                                    <x-input-label for="c_village_name" :value="__('City Name/ Village Name')" />
                                                    <x-text-input id="c_village_name"  :value="$studentaddress->village_name" 
                                                     
                                                        readonly type="text" class="mt-2 block w-full"
                                                        autocomplete="c_village_name" />
                                                    <x-input-error :messages="$errors->get('c_village_name')" class="mt-2" />
                                                </div>
            
                                                <div>
                                                    <x-input-label for="pincode" :value="__('Pincode')" />
                                                    <x-text-input id="pincode"  :value="$studentaddress->pincode" readonly        
                                                        type="number" class="mt-2 block w-full" autocomplete="pincode" />
                                                       
                                                    <x-input-error :messages="$errors->get('pincode')" class="mt-2" />
                                                </div>
                                                <div>
                                                    <label for="c_address"
                                                        class="block font-medium text-sm text-gray-700">Address</label>
            
                                                    <textarea rows="5" cols="40" readonly
                                                        class="mt-2 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'"
                                                        placeholder="Enter Address" required />{{$studentaddress->address }}</textarea>
            
            
                                                    @error('c_address')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
            
            
            
            
                                            </div>
                                        </div>
                                       
                                     
                                            <div class=" bg-slate-100 flex  justify-center px-7">
                                                 
                                                <form method="POST" action="{{route('student.AddressDetails.destroy',$studentaddress->id)}}"
                                                    
                                                    >
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
                                            </div>
                                       
            
                                    </section>
            
                                </div>
            
            
                            </div>
                        @endforeach
            
                    </div>





                </div>
            </div>
        </div>
    </div>
</x-student-layout>
