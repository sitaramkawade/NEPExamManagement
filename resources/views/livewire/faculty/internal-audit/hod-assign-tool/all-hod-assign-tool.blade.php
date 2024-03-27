<div>
    @if ($mode == 'view')
        <div>
            <x-card-header heading="View Uploaded Documents">
                <x-back-btn wire:click="setmode('all')" />
            </x-card-header>
            @include('livewire.faculty.internal-audit.hod-assign-tool.view-tool-document')
        </div>
    @elseif ($mode == 'all')
        <div>
            <x-breadcrumb.breadcrumb>
                <x-breadcrumb.link route="faculty.dashboard" name="Dashboard" />
                <x-breadcrumb.link name="HOD Tool's View" />
            </x-breadcrumb.breadcrumb>
            <x-card-header heading="HOD Tool View">
            </x-card-header>
            <x-table.frame x="0" sp="0" r="0">
                <x-slot:header>
                    <div class="flex gap-x-0.5">
                        <x-input-select id="academicyear_id" wire:model.live="academicyear_id" name="academicyear_id" class="text-center h-10">
                            <x-select-option class="text-start" hidden>Year </x-select-option>
                            @foreach ($academicyears as $academicyear)
                                <x-select-option wire:key="{{ $academicyear->id }}" value="{{ $academicyear->id }}" class="text-start">{{ $academicyear->year_name }}</x-select-option>
                            @endforeach
                        </x-input-select>
                        <x-table.cancel class="mx-2" wire:click='resetinput()' i="0"> Clear</x-table.cancel>
                    </div>
                </x-slot:header>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                                <x-table.th wire:click="sort_column('academicyear_id')" name="academicyear_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Academic Year</x-table.th>
                                <x-table.th>Subject Code</x-table.th>
                                <x-table.th wire:click="sort_column('subject_id')" name="subject_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject Name</x-table.th>
                                <x-table.th> Status </x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($groupedInternalDocuments as $key => $internalDocuments)
                                <x-table.tr wire:key="{{ $key }}">
                                    <x-table.td>{{ $internalDocuments->first()->id }}</x-table.td>
                                    <x-table.td>{{ $internalDocuments->first()->academicyear->year_name }}</x-table.td>
                                    <x-table.td>{{ $internalDocuments->first()->subject->subject_code }}</x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $internalDocuments->first()->subject->subject_name }}</x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        @if (!$internalDocuments->first()->deleted_at)
                                            @if ($internalDocuments->first()->status === 1)
                                                <x-table.active wire:click="status({{ $internalDocuments->first()->id }})" />
                                            @else
                                                <x-table.inactive wire:click="status({{ $internalDocuments->first()->id }})" />
                                            @endif
                                        @endif
                                    </x-table.td>
                                    <x-table.td>
                                        @if ($internalDocuments->first()->deleted_at)
                                            <x-table.delete wire:click="deleteconfirmation({{ $internalDocuments->first()->id }})" />
                                            <x-table.restore wire:click="restore({{ $internalDocuments->first()->id }})" />
                                        @else
                                            <x-table.view wire:click="view({{ $internalDocuments->first()->id }})" />
                                            <x-table.archive wire:click="delete({{ $internalDocuments->first()->id }})" />
                                        @endif
                                    </x-table.td>
                                </x-table.tr>
                            @empty
                                <x-table.tr>
                                    <x-table.td colSpan='8' class="text-center">No Data Found</x-table.td>
                                </x-table.tr>
                            @endforelse
                        </x-table.tbody>
                    </x-table.table>
                </x-slot>
                <x-slot:footer>
                    <x-table.paginate :data="$faculty_internal_documents" />
                </x-slot>
            </x-table.frame>
        </div>
    @endif
</div>
