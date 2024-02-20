<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading=" Add Exam Time Table">

            <x-back-btn wire:click="setmode('all')" />

        </x-card-header>
        <x-form wire:submit="add({{ $exam_pattern_class_id }})">
            @include('livewire.user.exam-time-table.exam-time-table-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Exam Time Table">
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
        </x-breadcrumb.breadcrumb>
            <x-card-header heading=" All Exam Time Table's">

            </x-card-header>
            <x-table.frame>
                <x-slot:header>
                    </x-slot>
                    <x-slot:body>
                        <x-table.table>
                            <x-table.thead>
                                <x-table.tr>
                                    <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
                                    <x-table.th wire:click="sort_column('exam_name')" name="exam_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Name </x-table.th>
                                    <x-table.th wire:click="sort_column('patternclass_id')" name="patternclass_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Pattern Class Name </x-table.th>
                                    <x-table.th> Action </x-table.th>
                                </x-table.tr>
                            </x-table.thead>
                            <x-table.tbody>
                                @forelse ($exampatternclasses as $exampatternclass)
                                <x-table.tr wire:key="{{ $exampatternclass->id }}">
                                    <x-table.td> {{ $exampatternclass->id }}</x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll> {{ $exampatternclass->exam?->exam_name }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ isset($exampatternclass->patternclass->pattern->pattern_name) ? $exampatternclass->patternclass->pattern->pattern_name : '-' }} {{ isset($exampatternclass->patternclass->courseclass->classyear->classyear_name) ? $exampatternclass->patternclass->courseclass->classyear->classyear_name : '-' }} {{ isset($exampatternclass->patternclass->courseclass->course->course_name) ? $exampatternclass->patternclass->courseclass->course->course_name : '-' }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>                                     
                                        <x-table.edit i="0" wire:click="create({{ $exampatternclass->id }})"> Create </x-table.edit>                                
                                        <x-table.edit i="0" wire:click="edit({{ $exampatternclass->id }})"> Edit </x-table.edit>                                   
                                        <x-table.edit i="0" wire:navigate :href="route('user.timetables',$exampatternclass->id)" > Download </x-table.edit>
                                        {{-- <x-table.edit i="0" wire:click="downloadTimetable({{ $exampatternclass->id }})"> Download </x-table.edit> --}}
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
                            <x-table.paginate :data="$exampatternclasses" />
                            </x-slot>
            </x-table.frame>
    </div>
    @endif
</div>
