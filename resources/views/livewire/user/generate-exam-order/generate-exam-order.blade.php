<div>

    @if ($mode=='add')
    <div>
        <x-card-header heading=" Add ">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
    </div>

    @elseif($mode=='all')
    <div>
        <x-breadcrumb.breadcrumb>
            <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
            <x-breadcrumb.link name="Order's" />
            </x-breadcrumb.link>
            <x-card-header heading="Generate Exam Order's">
                <x-add-btn wire:click="setmode('add')" />
            </x-card-header>
            <x-table.frame x='0' r='0'>
                <x-slot:header>
                    <div class="px-2 py-2  text-sm text-gray-600 dark:text-gray-400">
                        <x-select2.select multiple="multiple" style="width:100%;" id="sub_sem2" name="sub_sem2" wire:model='sub_sem2'>
                            <x-select-option class="text-start" hidden> -- Select Semester -- </x-select-option>
                            @foreach ($semesters as $semid2 => $semester2)
                            <x-select2.option value="{{ $semid2 }}">{{ $semester2 }}</x-select2.option>
                            @endforeach
                        </x-select2.select>
                    </div>
                    </x-slot>
                    <x-slot:body>
                        <x-table.table>
                            <x-table.thead>
                                <x-table.tr>
                                    <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
                                    {{-- <x-table.th wire:click="sort_column('sem')" name="sem" :sort="$sortColumn" :sort_by="$sortColumnBy">Semester </x-table.th> --}}
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
                                        <x-table.text-scroll> {{ $exampatternclass->exam->exam_name }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ isset($exampatternclass->patternclass->pattern->pattern_name) ? $exampatternclass->patternclass->pattern->pattern_name : '-' }} {{ isset($exampatternclass->patternclass->courseclass->classyear->classyear_name) ? $exampatternclass->patternclass->courseclass->classyear->classyear_name : '-' }} {{ isset($exampatternclass->patternclass->courseclass->course->course_name) ? $exampatternclass->patternclass->courseclass->course->course_name : '-' }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.edit i="0" wire:click="generateExamPanel({{ $exampatternclass->id }})">Create Order</x-table.edit>
                                        <x-table.edit i="0" wire:click="SendMail({{ $exampatternclass->id }})">Send Mail</x-table.edit></a>
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
