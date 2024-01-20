<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading="Add Exam">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.exam.exam-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Exam">
        <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $exam_id  }})">
        @include('livewire.user.exam.exam-form')
    </x-form>
    @elseif($mode=='all')
    <div>
   
        <x-card-header heading=" All Exam's">
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
                                <x-table.th wire:click="sort_column('exam_name')" name="exam_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Name </x-table.th>
                                <x-table.th wire:click="sort_column('exam_sessions')" name="exam_sessions" :sort="$sortColumn" :sort_by="$sortColumnBy">Session</x-table.th>
                                <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>

                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($exams as $exam)
                            <x-table.tr wire:key="{{ $exam->id }}">
                                <x-table.td>{{ $exam->id }}</x-table.td>
                                <x-table.td>{{ $exam->exam_name }} </x-table.td>
                                <x-table.td> {{ $exam->exam_sessions==0?"Session 1":"Session 2";}} </x-table.td>
                                <x-table.td>
                                    @if($exam->status==1)
                                    <x-status type="success">Active</x-status>
                                    @else
                                    <x-status type="danger">Inactive</x-status>
                                    @endif
                                </x-table.td>
                                <x-table.td>
                                    @if ($exam->deleted_at)
                                    <x-table.delete wire:click="deleteconfirmation({{ $exam->id }})" />
                                    <x-table.restore wire:click="restore({{ $exam->id }})" />
                                    @else
                                    <x-table.edit wire:click="edit({{ $exam->id }})" />
                                    @if($exam->status==1)
                                    <x-table.inactive wire:click="Status({{ $exam->id }})" />
                                    @else
                                    <x-table.active wire:click="Status({{ $exam->id }})" />
                                    @endif
                                    <x-table.archive wire:click="delete({{ $exam->id }})" />
                                    @endif
                                </x-table.td>
                            </x-table.tr>
                            @empty
                            <x-table.tr>
                                <x-table.td colSpan='5' class='text-center'>No Data Found</x-table.td>
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
