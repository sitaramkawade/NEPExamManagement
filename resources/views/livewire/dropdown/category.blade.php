<div>

    <div>

        <div class="max-w-2xl mx-auto">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an
                option</label>
            <select
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                wire:model.live="selectedCategory" id="category">
                <option value="" disabled>{{ 'Please Select Category' }}</option>
                @if ($countries)
                    @foreach ($countries as $category)
                        <option value="{{ $category->id }}">{{ $category->caste_category }}</option>
                    @endforeach

                @endif

            </select>

        </div>
        <div>
        </div>

        <div class="max-w-2xl mx-auto">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an
                option</label>
            <select
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"wire:model.live="selectedcaste"
                id="category">
                <option value="" disabled>{{ 'Please Select Caste' }}</option>
                @if ($castes)
                    @foreach ($castes as $caste)
                        <option class="  " value="{{ $caste->id }}">{{ $caste->caste_name }}</option>
                    @endforeach

                @endif
            </select>

        </div>
    </div>

</div>
