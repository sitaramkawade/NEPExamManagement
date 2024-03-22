<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading=" Add Qestion Bank">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>

        @include('livewire.user.question-paper-bank.question-form')

    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Qestion Bank">
        <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $bank_id  }})">
        @include('livewire.user.question-paper-bank.question-form')
    </x-form>
    @elseif($mode=='all')
    <div>
        <x-breadcrumb.breadcrumb>
            <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
            <x-breadcrumb.link name="Qestion Bank's" />
        </x-breadcrumb.breadcrumb>
            <x-card-header heading="All Qestion Bank's">
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
                                    <x-table.th wire:click="sort_column('papersubmission_id')" name="papersubmission_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Paper Submission </x-table.th>
                                    <x-table.th wire:click="sort_column('exam_id')" name="exam_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam </x-table.th>
                                    <x-table.th wire:click="sort_column('faculty_id')" name="faculty_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Faculty</x-table.th>
                                    <x-table.th wire:click="sort_column('user_id')" name="user_id" :sort="$sortColumn" :sort_by="$sortColumnBy">User </x-table.th>
                                    <x-table.th wire:click="sort_column('file_name')" name="file_name" :sort="$sortColumn" :sort_by="$sortColumnBy">File Name</x-table.th>
                                    <x-table.th wire:click="sort_column('is_used')" name="is_used" :sort="$sortColumn" :sort_by="$sortColumnBy">Used</x-table.th>
                                    <x-table.th> Action </x-table.th>
                                </x-table.tr>
                            </x-table.thead>
                            <x-table.tbody>
                                @forelse ($banks as $bank)
                                <x-table.tr wire:key="{{ $bank->id }}">
                                    <x-table.td> {{ $bank->id }}</x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll> {{ $bank->papersubmission->subject->subject_name }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td> {{ $bank->exam->exam_name}} </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll> {{ $bank->faculty->faculty_name }}</x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll> {{ $bank->user->name }}</x-table.text-scroll>
                                    </x-table.td> 
                                    <x-table.td>
                                        <x-table.text-scroll> {{ $bank->file_name }}</x-table.text-scroll>
                                    </x-table.td> 
                                    <x-table.td>
                                        @if ($bank->deleted_at)
                                        @elseif($bank->is_used==1)
                                        <x-status type="success">Yes</x-table.status>
                                        @else
                                        <x-status type="danger"> No </x-table.status>
                                        @endif
                                    </x-table.td>
                                    <x-table.td>
                                        @if ($bank->deleted_at)
                                        <x-table.delete wire:click="deleteconfirmation({{ $bank->id }})" />
                                        <x-table.restore wire:click="restore({{ $bank->id }})" />
                                        @else
                                        <x-table.edit wire:click="edit({{ $bank->id }})" />
                                        <x-table.archive wire:click="delete({{ $bank->id }})" />
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
                            <x-table.paginate :data="$banks" />
                            </x-slot>
            </x-table.frame>
    </div>
    @endif
</div>
