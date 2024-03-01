<div>
    <x-card-header heading="Exam Panels" />
    <div class="grid grid-cols-1 md:grid-cols-5">
        <div class="col-span-2">
            @if ($mode == 'add')
                <x-form wire:submit="save()">
                    @include('livewire.faculty.exam-panel.add-exam-panel-form')
                </x-form>
            @elseif ($mode == 'edit')
                <x-form wire:submit="update({{ $exampanel_id }})">
                    @include('livewire.faculty.exam-panel.add-exam-panel-form')
                </x-form>
            @elseif($mode == 'view')
                @include('livewire.faculty.exam-panel.view-form')
            @endif
        </div>
        <div class="col-span-3">
            <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
                <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
                    Exam Panel
                </div>
                <div>
                    <x-table.frame>
                        <x-slot:body>
                            <x-table.table>
                                <x-table.thead>
                                    <x-table.tr>
                                        <x-table.th wire:click="sort_column('subject_id')" name="subject_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject Name</x-table.th>
                                        <x-table.th wire:click="sort_column('faculty_id')" name="faculty_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Faculty Name</x-table.th>
                                        <x-table.th wire:click="sort_column('role_id')" name="role_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Role</x-table.th>
                                        <x-table.th> Action </x-table.th>
                                    </x-table.tr>
                                </x-table.thead>
                                <x-table.tbody>
                                    @forelse ($groupedExamPanels as $subjectId => $subjectExamPanels)
                                        <x-table.tr wire:key="{{ $subjectId }}">
                                            <x-table.td>
                                                <x-table.text-scroll>{{ $subjectExamPanels->first()->subject->subject_name }}</x-table.text-scroll>
                                            </x-table.td>
                                            <x-table.td>
                                                @forelse ($subjectExamPanels as $examPanel)
                                                    <x-table.text-scroll>{{ optional($examPanel->faculty)->faculty_name }}</x-table.text-scroll>
                                                @empty
                                                    <x-table.text-scroll>No Faculty Assigned</x-table.text-scroll>
                                                @endforelse
                                            </x-table.td>
                                            <x-table.td>
                                                @forelse ($subjectExamPanels as $examPanel)
                                                    <x-table.text-scroll class="my-1">{{ $examPanel->examorderpost->post_name }}</x-table.text-scroll>
                                                @empty
                                                    <x-table.text-scroll>No Faculty Assigned</x-table.text-scroll>
                                                @endforelse
                                            </x-table.td>
                                            <x-table.td>
                                                @forelse ($subjectExamPanels as $examPanel)
                                                    <p class="py-1">
                                                        @if ($examPanel->deleted_at)
                                                            <x-table.delete wire:click="deleteconfirmation({{ $examPanel->id }})" />
                                                            <x-table.restore wire:click="restore({{ $examPanel->id }})" />
                                                        @else
                                                            <x-table.view wire:click="view({{ $examPanel->id }})" />
                                                            <x-table.edit wire:click="edit({{ $examPanel->id }})" />
                                                            <x-table.archive wire:click="softdelete({{ $examPanel->id }})" />
                                                        @endif
                                                    </p>
                                                @empty
                                                    <p></p>
                                                @endforelse
                                            </x-table.td>
                                        </x-table.tr>
                                    @empty
                                        <x-table.tr>
                                            <x-table.td colSpan='4' class="text-center">No Data Found</x-table.td>
                                        </x-table.tr>
                                    @endforelse
                                </x-table.tbody>
                            </x-table.table>
                        </x-slot>
                        <x-slot:footer>
                            <x-table.paginate :data="$examPanels" />
                        </x-slot>
                    </x-table.frame>
                </div>
            </div>
        </div>
    </div>
</div>
