<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Question Bank
        <x-spinner />
    </div>
    

    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_id" :value="__('Select Subject')" />
            <x-required />
            <x-input-select id="subject_id" wire:model.live="subject_id" name="subject_id" class="text-center w-full mt-1" :value="old('subject_id', $subject_id)" required autocomplete="subject_id">
                <x-select-option class="text-start" hidden> -- Select Subject -- </x-select-option>
                @forelse ($subjects as $subject)
                <x-select-option wire:key="{{ $subject->id }}" value="{{ $subject->id }}" class="text-start">{{ $subject->subject_name??'-' }}</x-select-option>
                @empty
                <x-select-option class="text-start">Papersubmission Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('papersubmission_id')" class="mt-1" />
        </div>
    </div>

    <div class="m-2 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
        <x-table.table>
            <x-table.thead>
                <x-table.tr>
                    <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                    <x-table.th wire:click="sort_column('set_id')" name="set_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Set</x-table.th>
                    <x-table.th wire:click="sort_column('file_path')" name="file_path" :sort="$sortColumn" :sort_by="$sortColumnBy">File </x-table.th>
                </x-table.tr>
            </x-table.thead>
            <x-table.tbody>
                @forelse ($sets as $set)
                <x-table.tr wire:key="{{ $set->id }}">
                    <x-table.td>{{ $set->id }} </x-table.td>
                    <x-table.td>{{ $set->set_name }} </x-table.td>
                    <x-table.td>
                        <div class="flex items-center mb-2">
                            <x-input-file class="text-xs file:px-2 file:rounded-sm file:text-xs w-[75%] mr-2" name="file_path" id="file_path" wire:model="file_path" accept=".pdf" />
                            <x-table.upload-btn i="0" wire:loading.attr="disabled" wire:target="document_to_upload" wire:loading.class.remove="cursor-pointer" wire:loading.class.add="cursor-not-allowed">Upload</x-table.upload-btn>
                        </div>
                    </x-table.td>
                </x-table.tr>
                @empty
                <x-table.tr>
                    <x-table.td colSpan='8' class="text-center">No Data Found</x-table.td>
                </x-table.tr>
                @endforelse
            </x-table.tbody>
        </x-table.table>
    </div>
</div>
