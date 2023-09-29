<div>
 
    @if (!isset($addresstypes))
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
                                        <button type="submit"
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
        @livewire('master.table')
    </div>
        {{-- <x-table>
            <x-slot name="head" >
                <x-tables.row> <x-tables.heading sortable> state_code
                </x-tables.heading>
                <x-tables.heading  sortable direction='asc'> state_name
                </x-tables.heading>
                <x-tables.heading  sortable> Country
                </x-tables.heading>
                <x-tables.heading  sortable> Code
                </x-tables.heading>
                <x-tables.heading  sortable> Date
                </x-tables.heading>
                </x-tables.row>
            </x-slot>
            <x-slot name="body" >
            
             @foreach($allstates as $state)
             
                <x-tables.row>
                    <x-tables.cell> {{$state->state_code}}   </x-tables.cell>  
                    <x-tables.cell> {{$state->state_name}}   </x-tables.cell> 
                    <x-tables.cell> {{$state->country->country_name}}   </x-tables.cell>
                    <x-tables.cell > <span class=" bg-{{$state->StateColor}}-500 text-white h-6 w-6 px-2 py-2 rounded-full">{{$state->state_or_UT}} </span>   </x-tables.cell> 
                    <x-tables.cell> {{$state->CreatedDateFormat}}   </x-tables.cell>
                </x-tables.row>
              
                @endforeach
            </x-slot>
        </x-table> --}}

        
{{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Color
                        <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
  </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Category
                        <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
  </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Price
                        <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
  </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
           
        </tbody>
    </table>
</div> --}}

       
    @endif
</div>
