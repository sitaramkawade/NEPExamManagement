<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Subject Vertical Detail's
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_vertical" :value="__('Subject Vertical')" />
            @if ($isDisabled)
                <x-text-input id="subject_vertical" type="text" :value="$subject_vertical" disabled class="bg-gray-100 cursor-not-allowed @error('subject_vertical') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectvertical_shortname" :value="__('Subject Vertical Shortname')" />
            @if ($isDisabled)
                <x-text-input id="subjectvertical_shortname" type="text" :value="$subjectvertical_shortname" disabled class="bg-gray-100 cursor-not-allowed @error('subjectvertical_shortname') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subjectbuckettype_id" :value="__('Subject Bucket Type')" />
            @if ($isDisabled)
                <x-text-input id="subjectbuckettype_id" type="text" :value="$subjectbuckettype_id" disabled class="bg-gray-100 cursor-not-allowed @error('subjectbuckettype_id') is-invalid @enderror w-full mt-1" />
            @endif
        </div>
    </div>
</div>
