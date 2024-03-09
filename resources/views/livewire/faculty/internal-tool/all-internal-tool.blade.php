
<div>
    @if ($mode == 'add')
        <div>
            <x-card-header heading="Add Internal Tool">
                <x-back-btn wire:click="setmode('all')" />
            </x-card-header>
            <x-form wire:submit="save()">
                @include('livewire.faculty.internal-tool.internaltool-form')
            </x-form>
        </div>
    @elseif($mode == 'edit')
        <x-card-header heading="Edit Internal Tool">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="update({{ $internaltool_id }})">
            @include('livewire.faculty.internal-tool.internaltool-form')
        </x-form>
    @elseif($mode == 'view')
        <x-card-header heading="View Internal Tool">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        @include('livewire.faculty.internal-tool.view-form')
    @elseif($mode == 'all')
        <div>
            <x-breadcrumb.breadcrumb>
                <x-breadcrumb.link route="faculty.dashboard" name="Dashboard" />
                <x-breadcrumb.link name="Internal Tool's" />
            </x-breadcrumb.breadcrumb>
            <x-card-header heading="All Internal Tool's">
                <x-add-btn wire:click="setmode('add')" />
            </x-card-header>
            <x-table.frame>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                                <x-table.th wire:click="sort_column('internal_tool_master_toolname')" name="internal_tool_master_toolname" :sort="$sortColumn" :sort_by="$sortColumnBy">Tool Name</x-table.th>
                                <x-table.th wire:click="sort_column('internaltooldocument_id')" name="internaltooldocument_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Document Name</x-table.th>
                                <x-table.th wire:click="sort_column('internal_tool_master_course_type')" name="internal_tool_master_course_type" :sort="$sortColumn" :sort_by="$sortColumnBy">Course Type</x-table.th>
                                <x-table.th wire:click="sort_column('is_multiple')" name="is_multiple" :sort="$sortColumn" :sort_by="$sortColumnBy">Multiple Document</x-table.th>
                                <x-table.th> Status </x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($groupedInternalTools as $internalToolId => $internalTools)
                                <x-table.tr wire:key="{{ $internalToolId }}">
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $internalToolId }}</x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $internalTools->first()->internaltoolmaster->toolname }}</x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        @foreach ($internalTools as $internalTool)
                                            <x-table.text-scroll>{{ optional($internalTool->internaltooldocumentmaster)->doc_name }}</x-table.text-scroll>
                                        @endforeach
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ $internalTools->first()->internaltoolmaster->course_type }}</x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>
                                            @if ($internalTool->internal_tool_document_is_multiple === 1)
                                                <x-status type="success"> Yes </x-status>
                                            @else
                                                <x-status type="info"> No </x-status>
                                            @endif
                                        </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        @if ($internalTool->internal_tool_master_status === 1)
                                            <x-table.active wire:click="status({{ $internalTool->internaltoolmaster_id }})" />
                                        @else
                                            <x-table.inactive wire:click="status({{ $internalTool->internaltoolmaster_id }})" />
                                        @endif
                                    </x-table.td>
                                    <x-table.td>
                                        <p class="py-1">
                                            @if ($internalTool->deleted_at)
                                                <x-table.delete wire:click="deleteconfirmation({{ $internalTool->id }})" />
                                                <x-table.restore wire:click="restore({{ $internalTool->id }})" />
                                            @else
                                                <x-table.view wire:click="view({{ $internalTool->id }})" />
                                                <x-table.edit wire:click="edit({{ $internalTool->id }})" />
                                                <x-table.archive wire:click="softdelete({{ $internalTool->id }})" />
                                            @endif
                                        </p>
                                    </x-table.td>
                                </x-table.tr>
                            @empty
                                <x-table.tr>
                                    <x-table.td colSpan='7' class="text-center">No Data Found</x-table.td>
                                </x-table.tr>
                            @endforelse
                        </x-table.tbody>
                    </x-table.table>
                </x-slot>
                <x-slot:footer>
                    <x-table.paginate :data="$internaltools_from_view" />
                </x-slot>
            </x-table.frame>
        </div>
    @endif
</div>
