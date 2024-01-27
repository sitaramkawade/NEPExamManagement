<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading=" Add Exam Time Table">

            <x-back-btn wire:click="setmode('all')" />

        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.exam-time-table.exam-time-table-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Educational Course">
        <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $time_id }})">
        @include('livewire.user.exam-time-table.exam-time-table-form')
    </x-form>
    @elseif($mode=='all')
    <div>
        <x-breadcrumb.breadcrumb>
            <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
            <x-breadcrumb.link name="Exam Time Table's" />
            </x-breadcrumb.link>
            <x-card-header heading=" All Exam Time Table's">
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
                                    <x-table.th wire:click="sort_column('subject_id')" name="subject_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject </x-table.th>
                                    <x-table.th wire:click="sort_column('exam_patternclasses_id')" name="exam_patternclasses_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Pattern Class</x-table.th>
                                    <x-table.th wire:click="sort_column('examdate')" name="examdate" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Date</x-table.th>
                                    <x-table.th wire:click="sort_column('timeslot_id')" name="timeslot_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Time Slot</x-table.th>
                                    <x-table.th wire:click="sort_column('is_active')" name="is_active" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
                                    <x-table.th> Action </x-table.th>
                                </x-table.tr>
                            </x-table.thead>
                            <x-table.tbody>
                                @forelse ($ExamTimeTables as $ExamTimeTable)
                                <x-table.tr wire:key="{{ $ExamTimeTable->id }}">
                                    <x-table.td> {{ $ExamTimeTable->id }}</x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll> {{ isset($ExamTimeTable->subject->subject_name) ? $ExamTimeTable->subject->subject_name : '-' }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td> <x-table.text-scroll>{{ isset($ExamTimeTable->exampatternclass->exam->exam_name) ? $ExamTimeTable->exampatternclass->exam->exam_name : '-' }} {{ isset($ExamTimeTable->exampatternclass->patternclass->pattern->pattern_name) ? $ExamTimeTable->exampatternclass->patternclass->pattern->pattern_name : '-' }} {{ isset($ExamTimeTable->exampatternclass->patternclass->courseclass->classyear->classyear_name) ? $ExamTimeTable->exampatternclass->patternclass->courseclass->classyear->classyear_name : '-' }} {{ isset($ExamTimeTable->exampatternclass->patternclass->courseclass->course->course_name) ? $ExamTimeTable->exampatternclass->patternclass->courseclass->course->course_name : '-' }} </x-table.text-scroll></x-table.td>
                                    <x-table.td> {{ $ExamTimeTable->examdate }} </x-table.td>
                                    <x-table.td> {{ isset($ExamTimeTable->timetableslot->timeslot) ? $ExamTimeTable->timetableslot->timeslot : '-' }} </x-table.td>

                                    <x-table.td>
                                        @if($ExamTimeTable->status==1)
                                        <x-table.active wire:click="Status({{ $ExamTimeTable->id }})" />
                                        @else
                                        <x-table.inactive wire:click="Status({{ $ExamTimeTable->id }})" />
                                        @endif

                                    </x-table.td>
                                    <x-table.td>
                                        @if ($ExamTimeTable->deleted_at)
                                        <x-table.delete wire:click="deleteconfirmation({{ $ExamTimeTable->id }})" />
                                        <x-table.restore wire:click="restore({{ $ExamTimeTable->id }})" />
                                        @else
                                        <x-table.edit wire:click="edit({{ $ExamTimeTable->id }})" />
                                        <x-table.archive wire:click="delete({{ $ExamTimeTable->id }})" />
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
                            <x-table.paginate :data="$ExamTimeTables" />
                            </x-slot>
            </x-table.frame>
    </div>
    @endif
</div>
