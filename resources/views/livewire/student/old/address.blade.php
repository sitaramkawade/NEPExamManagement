<div>
 
    
    @if ($addresstypes)
        <form wire:submit="save">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2 space-y-2">
                {{-- Correspondence Address --}}

                @foreach ($addresstypes as $addresstype)
                    <div class="p-3  sm:px-6 sm:py-4 bg-white dark:bg-gray-800 shadow rounded-md">
                        <div class=" max-w-full  " x-data={open:true}>
                            <div class=" flex   justify-between   ">
                                <header>
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __($addresstype->type) }}
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __($addresstype->type_devnagari) }}
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
                                                wire:key="{{ $present ? 1 : $addresstype->id }}"
                                                wire:model.live="selectedCountry.{{ $present ? 1 : $addresstype->id }}"
                                                id="country" required>
                                                <option value="">{{ 'Please Select Country' }}</option>

                                                @if ($countries)
                                                    @foreach ($countries as $country)
                                                        <option
                                                            value="{{ $present ? 1 : $addresstype->id }}.{{ $country->id }}">
                                                            {{ $country->country_name }}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>

                                        </div>
                                        {{-- States --}}
                                        <div class="max-w-2xl mx-auto">
                                            <label for="states"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                                                State</label>
                                            <select
                                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                                                wire:key="{{ $present ? 1 : $addresstype->id }}"
                                                wire:model.live="selectedState.{{ $present ? 1 : $addresstype->id }}"
                                                id="state" required>
                                                <option value="">{{ 'Please Select Country' }}</option>

                                                @if (!is_null($states[$present ? 1 : $addresstype->id]))
                                                    @foreach ($states[$present ? 1 : $addresstype->id] as $state)
                                                        <option
                                                            value="{{ $present ? 1 : $addresstype->id }}.{{ $state->id }}"">
                                                            {{ $state->state_name }}</option>
                                                    @endforeach
                                                @endif


                                            </select>

                                        </div>
                                        {{-- Districts --}}
                                        <div class="max-w-2xl mx-auto">
                                            <label for="districts"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                                                District</label>
                                            <select
                                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                                                wire:model.live="selectedDistrict.{{ $present ? 1 : $addresstype->id }}"
                                                id="district" required>
                                                <option value="">{{ 'Please Select District' }}</option>
                                                @if (!is_null($districts[$present ? 1 : $addresstype->id]))
                                                    @foreach ($districts[$present ? 1 : $addresstype->id] as $district)
                                                        <option
                                                            value="{{ $present ? 1 : $addresstype->id }}.{{ $district->id }}">
                                                            {{ $district->district_name }}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>

                                        </div>
                                        {{-- Taluka --}}
                                        <div class="max-w-2xl mx-auto">
                                            <label for="talukas"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                                                Taluka</label>
                                            <select
                                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                                                wire:model.live="selectedTalukas.{{ $present ? 1 : $addresstype->id }}"
                                                id="c_taluka_id" required>
                                                <option value="">{{ 'Please Select Country' }}</option>
                                                @if (!is_null($talukas[$present ? 1 : $addresstype->id]))
                                                    @foreach ($talukas[$present ? 1 : $addresstype->id] as $talukac)
                                                        <option value="{{ $talukac->id }}">
                                                            {{ $talukac->taluka_name }}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>

                                        </div>




                                    </div>
                                    {{-- Right Part --}}
                                    <div class="flex-1 px-2 space-y-6">

                                        <div>
                                            <x-input-label for="c_village_name" :value="__('City Name/ Village Name')" />
                                            <x-text-input id="c_village_name"
                                                wire:model.live="c_village_name.{{ $present ? 1 : $addresstype->id }}"
                                                required type="text" class="mt-2 block w-full"
                                                autocomplete="c_village_name" />
                                            <x-input-error :messages="$errors->get('c_village_name')" class="mt-2" />
                                        </div>

                                        <div>
                                            <x-input-label for="c_pincode" :value="__('Pincode')" />
                                            <x-text-input id="c_pincode"
                                                wire:model="c_pincode.{{ $present ? 1 : $addresstype->id }}" required
                                                type="number" class="mt-2 block w-full" autocomplete="c_pincode" />
                                            <x-input-error :messages="$errors->get('c_pincode')" class="mt-2" />
                                        </div>
                                        <div>
                                            <label for="c_address"
                                                class="block font-medium text-sm text-gray-700">Address</label>

                                            <textarea rows="5" cols="40" wire:model="c_address.{{ $present ? 1 : $addresstype->id }}" id="c_address"
                                                class="mt-2 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'"
                                                placeholder="Enter Address" required />
                            
                            </textarea>


                                            @error('c_address')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>




                                    </div>
                                </div>
                                @if ($addresstype->id === 1)
                                    <div class="p-6">

                                        <div class="ml-12">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                                <input type="checkbox" wire:model.live="present" /> Is permanent address
                                                is same
                                                as Correspondence address
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($addresstype->id === 2 || $addresstypes->count() == 1)
                                    <div class=" bg-slate-100 flex  justify-center px-7">
                                        <button type="submit" title="submit"
                                            class="    text-white bg-[#FF9119] hover:bg-[#FF9119]/80
                             focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium 
                             rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center 
                              ">
                                            Save
                                        </button>
                                    </div>
                                @endif

                            </section>

                        </div>


                    </div>
                @endforeach

            </div>




        </form>
    @else
    <div>
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
                                     
                                    <form method="POST" action="{{route('student.AddressDetails.destroy',$studentaddress->id)}}">
                                       @csrf
                                        @method('DELETE')
                                   
                                        <button type="submit" title="submit"
                                        class="    text-white bg-[#FF9119] hover:bg-[#FF9119]/80
                         focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium 
                         rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center 
                          ">
                                        Delete
                                    </button>
                                </div>
                           

                        </section>

                    </div>


                </div>
            @endforeach

        </div>


        {{-- <livewire:master.table /> --}}
        
    </div>
       

       
    @endif
</div>
