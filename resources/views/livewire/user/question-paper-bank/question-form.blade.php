<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Question Bank
        <x-spinner />
    </div>

    <div class="m-2 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
        <x-table.table>
            <x-table.thead>
                <x-table.tr>
                    <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                    <x-table.th wire:click="sort_column('subject_id')" name="subject_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject</x-table.th>
                    @foreach ($sets as $set)  <x-table.th >{{'Set '.$set->set_name }} </x-table.th> @endforeach
                </x-table.tr>
            </x-table.thead>
            <x-table.tbody>
                @forelse ($subjects as $subject)
                <x-table.tr wire:key="{{ $subject->id }}">
                    <x-table.td>{{ $subject->id }} </x-table.td>
                    <x-table.td>{{ $subject->subject_name }} </x-table.td>
                    {{-- <x-table.td>
                        <div class="flex items-center mb-2">
                            <x-input-file class="text-xs file:px-2 file:rounded-sm file:text-xs w-[75%] mr-2" name="file_path" id="file_path" wire:model="file_path" accept=".pdf" />
                            <x-table.upload-btn i="0" wire:loading.attr="disabled" wire:target="file_path" wire:loading.class.remove="cursor-pointer" wire:loading.class.add="cursor-not-allowed">Upload</x-table.upload-btn>
                        </div>
                    </x-table.td>
                    <x-table.td>
                        <div class="flex items-center mb-2">
                            <x-input-file class="text-xs file:px-2 file:rounded-sm file:text-xs w-[75%] mr-2" name="file_path" id="file_path" wire:model="file_path" accept=".pdf" />
                            <x-table.upload-btn i="0" wire:loading.attr="disabled" wire:target="file_path" wire:loading.class.remove="cursor-pointer" wire:loading.class.add="cursor-not-allowed">Upload</x-table.upload-btn>
                        </div>
                    </x-table.td>
                    <x-table.td>
                        <div class="flex items-center mb-2">
                            <x-input-file class="text-xs file:px-2 file:rounded-sm file:text-xs w-[75%] mr-2" name="file_path" id="file_path" wire:model="file_path" accept=".pdf" />
                            <x-table.upload-btn i="0" wire:loading.attr="disabled" wire:target="file_path" wire:loading.class.remove="cursor-pointer" wire:loading.class.add="cursor-not-allowed">Upload</x-table.upload-btn>
                        </div>
                    </x-table.td> --}}

                    @foreach ($sets as $set)  
                    
                    <x-table.td>
                        <div class="flex items-center mb-2">
                            <x-input-file class="text-xs file:px-2 file:rounded-sm file:text-xs w-[75%] mr-2" name="questionbank.{{ $subject->id }}.{{ $set->id }}" id="file_path" wire:model="questionbank.{{ $subject->id }}.{{ $set->id }}" accept=".pdf" />
                            <x-table.upload-btn wire:click="upload_document" i="0" wire:loading.attr="disabled" wire:target="questionbank.{{ $subject->id }}.{{ $set->id }}" wire:loading.class.remove="cursor-pointer" wire:loading.class.add="cursor-not-allowed">Upload</x-table.upload-btn>
                        </div>
                    </x-table.td> 
                    
                    @endforeach
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