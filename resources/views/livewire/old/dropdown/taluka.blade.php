<div>
    {{-- Country --}}

    <div class="max-w-2xl mx-auto">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
            Country</label>
        <select
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            wire:model.live="selectedCountry" id="country">
            <option value="">{{ 'Please Select Country' }}</option>
            @if ($countries)
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach

            @endif

        </select>

    </div>
    {{-- States --}}
    <div class="max-w-2xl mx-auto">
        <label for="states" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
            State</label>
        <select
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            wire:model.live="selectedState" id="state">
            <option value="">{{ 'Please Select Country' }}</option>
            @if ($states)
                @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                @endforeach

            @endif

        </select>

    </div>
    {{-- Districts --}}
    <div class="max-w-2xl mx-auto">
        <label for="districts" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
            District</label>
        <select
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            wire:model.live="selectedDistrict" id="district">
            <option value="">{{ 'Please Select District' }}</option>
            @if ($districts)
                @foreach ($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                @endforeach

            @endif

        </select>

    </div>
    {{-- Taluka --}}
    <div class="max-w-2xl mx-auto">
        <label for="talukas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
            Taluka</label>
        <select
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            wire:model.live="selectedTaluka" id="taluka">
            <option value="">{{ 'Please Select Country' }}</option>
            @if ($talukas)
                @foreach ($talukas as $taluka)
                    <option value="{{ $taluka->id }}">{{ $taluka->taluka_name }}</option>
                @endforeach

            @endif

        </select>

    </div>
    <button type="submit" wire:click="$dispatch('post-deleted')">Delete Post</button>
    <button @click="$wire.test()=''">Click Ne</button>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
 
    </div>

</div>
