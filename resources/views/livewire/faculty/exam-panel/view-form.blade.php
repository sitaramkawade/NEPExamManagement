<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        @if($mode == 'view')
           <span>View Exam Panel</span>
           <x-table.download i="0" class="float-end text-xs text-white" wire:click="setmode('add')">Back</x-table.download>
        @endif
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="patternclass_id" :value="__('Pattern Class Name')" />
            @if ($isDisabled)
                <x-text-input id="patternclass_id" type="text" :value="$patternclass_id" disabled class="bg-gray-100 cursor-not-allowed @error('patternclass_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_id" :value="__('Subject Name')" />
            @if ($isDisabled)
                <x-text-input id="subject_id" type="text" :value="$subject_id" disabled class="bg-gray-100 cursor-not-allowed @error('subject_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="post_id" :value="__('Post Name')" />
            @if ($isDisabled)
                <x-text-input id="post_id" type="text" :value="$post_id" disabled class="bg-gray-100 cursor-not-allowed @error('post_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="department_id" :value="__('Department Name')" />
            @if ($isDisabled)
                <x-text-input id="department_id" type="text" :value="$department_id" disabled class="bg-gray-100 cursor-not-allowed @error('department_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="faculty_id" :value="__('Faculty Name')" />
            @if ($isDisabled)
                <x-text-input id="faculty_id" type="text" :value="$faculty_id" disabled class="bg-gray-100 cursor-not-allowed @error('faculty_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</div>
