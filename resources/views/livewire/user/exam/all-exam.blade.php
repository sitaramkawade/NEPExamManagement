<div>
    @if ($mode=='add')
    <div>
        <x-card-header>
            Add Exam
            <x-slot name="button">
                <x-back-btn wire:click="setmode('all')" />
            </x-slot>
        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.exam.exam-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header>
        Edit Exam
        <x-slot name="button">
            <x-back-btn wire:click="setmode('all')" />
        </x-slot>
    </x-card-header>
    <x-form wire:submit="update({{ $exam_id  }})">
        @include('livewire.user.exam.exam-form')
    </x-form>
    @elseif($mode='all')
    <div>
        <x-card-header>
            All Exam
            <x-slot name="button">
                <x-add-btn wire:click="setmode('add')" />
            </x-slot>
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
                                <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
                                <x-table.th wire:click="sort_column('exam_sessions')" name="exam_sessions" :sort="$sortColumn" :sort_by="$sortColumnBy">Session</x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($exams as $key => $exam)
                            <x-table.tr wire:key="{{ $exam->id }}">
                                <x-table.td>{{ $key+1 }}</x-table.td>
                                <x-table.td class="text-pretty">{{ $exam->exam_name }} </x-table.td>
                                <x-table.td> {{ $exam->status==0?"Inactive":"Active";}} </x-table.td>
                                <x-table.td> {{ $exam->status==0?"Session 1":"Session 2";}} </x-table.td>
                                <x-table.td>
                                    <x-table.edit wire:click="edit({{   $exam->id  }})" />
                                    <x-table.delete wire:click="deleteExam({{   $exam->id  }})" />

                                </x-table.td>
                            </x-table.tr>
                            @empty
                            <x-table.tr>
                                <x-table.td colSpan='5'>No Data Found</x-table.td>
                            </x-table.tr>
                            @endforelse
                        </x-table.tbody>
                    </x-table.table>
                    </x-slot>
                    <x-slot:footer>
                        <x-table.paginate :data="$exams" />
                        </x-slot>
        </x-table.frame>
    </div>
    @endif
</div>