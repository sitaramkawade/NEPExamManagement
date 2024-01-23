<x-card-collapsible heading="Faculty Head Details">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="faculty_id" :value="__('Faculty Name')" />
            @if ($isDisabled)
                <x-text-input id="faculty_id" type="text" :value="$faculty_id" disabled class="bg-gray-100 cursor-not-allowed @error('faculty_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="department_id" :value="__('Department Name')" />
            @if ($isDisabled)
                <x-text-input id="department_id" type="text" :value="$department_id" disabled class="bg-gray-100 cursor-not-allowed @error('department_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="status" :value="__('Status')" />
            @if ($isDisabled)
            <x-text-input id="status" type="text" :value="$status == 1 ? 'Active' : 'Inactive'" disabled class="bg-gray-100 cursor-not-allowed @error('status') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</x-card-collapsible>
