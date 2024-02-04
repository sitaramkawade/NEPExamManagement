<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Subject Category Detail's
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectcategory" :value="__('Subject Category')" />
            @if ($isDisabled)
                <x-text-input id="subjectcategory" type="text" :value="$subjectcategory" disabled class="bg-gray-100 cursor-not-allowed @error('subjectcategory') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectcategory_shortname" :value="__('Subject Category Shortname')" />
            @if ($isDisabled)
                <x-text-input id="subjectcategory_shortname" type="text" :value="$subjectcategory_shortname" disabled class="bg-gray-100 cursor-not-allowed @error('subjectcategory_shortname') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectbucket_type" :value="__('Subject Bucket Type')" />
            @if ($isDisabled)
                <x-text-input id="subjectbucket_type" type="text" :value="$subjectbucket_type" disabled class="bg-gray-100 cursor-not-allowed @error('subjectbucket_type') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</div>
