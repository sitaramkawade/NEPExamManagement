<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading=" Add Exam Time Table">
            <x-back-btn wire:click="setmode('all')" />

        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.exam-time-table.subject-exam-time-table-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Subject Wise Exam Time Table">
        <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $college_id  }})">
        @include('livewire.user.exam-time-table.subject-exam-time-table-form')
    </x-form>
    @elseif($mode=='all')
    <div>
        <x-card-header heading=" All Subject Wise Exam Time Table's">
            <x-add-btn wire:click="setmode('add')" />
        </x-card-header>
        <x-table.frame>
            <x-slot:header>
                </x-slot>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
                                {{-- <x-table.th wire:click="sort_column('exam_patternclasses_id')" name="exam_patternclasses_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Pattern Class </x-table.th> --}}
                                <x-table.th wire:click="sort_column('subjectbucket_id')" name="subjectbucket_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject </x-table.th>
                                <x-table.th wire:click="sort_column('examdate')" name="examdate" :sort="$sortColumn" :sort_by="$sortColumnBy">Date </x-table.th>
                                <x-table.th wire:click="sort_column('timeslot_id')" name="timeslot_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Time</x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($examtimetables as $examtimetable)
                            <x-table.tr wire:key="{{ $examtimetable->subjectbucket_id }}">
                                <x-table.td> {{ $examtimetable->subjectbucket_id }}</x-table.td>
                                {{-- <x-table.td> $examtimetable->exampatternclass->exam->exam_name??'-' {{ get_pattern_class_name($examtimetable->exampatternclass->patternclass_id) }}</x-table.td> --}}
                                <x-table.td class="text-wrap">
                                   {{ isset($examtimetable->subjectbucket->subject->subject_name) ? $examtimetable->subjectbucket->subject->subject_name : '-' }} 
                                </x-table.td>
                                <x-table.td> {{ $examtimetable->examdate }}</x-table.td>
                                <x-table.td> {{ $examtimetable->timetableslot->timeslot }}</x-table.td>
                                <x-table.td>                                                                     
                                    <x-table.edit i="0" wire:click="edit({{ $examtimetable->id }})"> Edit </x-table.edit>                                   
                                    @if ($examtimetable->deleted_at)
                                    <x-table.restore wire:click="restore({{ $examtimetable->id }})" />
                                    @else
                                    <x-table.archive wire:click="delete({{ $examtimetable->id }})" />
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
                      
                        </x-slot>
        </x-table.frame>
    </div>
    @endif
</div>
