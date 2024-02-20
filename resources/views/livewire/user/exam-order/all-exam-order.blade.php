<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading=" Add Exam Order">

            <x-back-btn wire:click="setmode('all')" />

        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.exam-order.exam-order-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Exam Order">
        <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $edit_id }})">
         @include('livewire.user.exam-order.exam-order-form')
    </x-form>
    @elseif($mode=='all')
    <div>
        <x-breadcrumb.breadcrumb>
            <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
            <x-breadcrumb.link name="Exam Order's" />
        </x-breadcrumb.breadcrumb>
            <x-card-header heading=" All Exam Order's">
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
                                    <x-table.th wire:click="sort_column('exampanel_id')" name="exampanel_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Panel </x-table.th>
                                    <x-table.th wire:click="sort_column('exam_patternclass_id')" name="exam_patternclass_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Pattern Class</x-table.th>
                                    <x-table.th wire:click="sort_column('description')" name="description" :sort="$sortColumn" :sort_by="$sortColumnBy"> Description</x-table.th>
                                    <x-table.th wire:click="sort_column('email_status')" name="email_status" :sort="$sortColumn" :sort_by="$sortColumnBy">Email Send</x-table.th>
                                    <x-table.th> Action </x-table.th>
                                </x-table.tr>
                            </x-table.thead>
                            <x-table.tbody>
                                @forelse ($examorders as $examorder)
                                <x-table.tr wire:key="{{ $examorder->id }}">
                                    <x-table.td> {{ $examorder->id }} </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll> {{ isset($examorder->exampanel->faculty->faculty_name) ? $examorder->exampanel->faculty->faculty_name : '-' }} {{ isset($examorder->exampanel->examorderpost->post_name) ? $examorder->exampanel->examorderpost->post_name : '-' }} {{ isset($examorder->exampanel->subject->subject_name) ? $examorder->exampanel->subject->subject_name : '-' }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td> <x-table.text-scroll>{{ isset($examorder->exampatternclass->exam->exam_name) ? $examorder->exampatternclass->exam->exam_name : '-' }} {{ isset($examorder->exampatternclass->patternclass->pattern->pattern_name) ? $examorder->exampatternclass->patternclass->pattern->pattern_name : '-' }} {{ isset($examorder->exampatternclass->patternclass->courseclass->classyear->classyear_name) ? $examorder->exampatternclass->patternclass->courseclass->classyear->classyear_name : '-' }} {{ isset($examorder->exampatternclass->patternclass->courseclass->course->course_name) ? $examorder->exampatternclass->patternclass->courseclass->course->course_name : '-' }} </x-table.text-scroll></x-table.td>
                                    <x-table.td> {{ $examorder->description }} </x-table.td>                          
                                    <x-table.td>
                                      @if ($examorder->deleted_at)
                                        @elseif($examorder->email_status==1)
                                        <x-status type="success">Yes</x-table.status>
                                        @else
                                        <x-status type="danger"> No </x-table.status>
                                        @endif

                                    </x-table.td>
                                    <x-table.td>
                                        @if ($examorder->deleted_at)
                                        <x-table.delete wire:click="deleteconfirmation({{ $examorder->id }})" />
                                        <x-table.restore wire:click="restore({{ $examorder->id }})" />
                                        @else
                                        <x-table.edit wire:click="edit({{ $examorder->id }})" />
                                        <x-table.archive wire:click="delete({{ $examorder->id }})" />
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
                            <x-table.paginate :data="$examorders" />
                            </x-slot>
            </x-table.frame>
    </div>
    @endif
</div>
