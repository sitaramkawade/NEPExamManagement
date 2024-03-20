<div>
    @if ($mode == 'add')
        <div>
            <x-card-header heading="Add Paper Submission">
            </x-card-header>
            <x-form wire:submit="save()">
            @include('livewire.User.paper-submission.paper-submission-form')
            </x-form>
        </div>
    @elseif($mode == 'edit')
        <x-card-header heading="Edit Paper Submission">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="update({{ $paper_id }})">
            @include('livewire.User.paper-submission.paper-submission-form')
        </x-form>

    @elseif($mode == 'all')
        <div>
            <x-breadcrumb.breadcrumb>
                <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
                <x-breadcrumb.link name="Paper Submission's" />
            </x-breadcrumb.breadcrumb>
            <x-card-header heading="All Paper Submission's">
                <x-add-btn wire:click="setmode('add')" />
            </x-card-header>
            <x-table.frame>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                                <x-table.th wire:click="sort_column('exam_id')" name="exam_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Name</x-table.th>
                                <x-table.th wire:click="sort_column('subject_id')" name="subject_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject Name</x-table.th>
                                <x-table.th wire:click="sort_column('faculty_id')" name="faculty_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Faculty Name</x-table.th>
                                <x-table.th wire:click="sort_column('user_id')" name="user_id" :sort="$sortColumn" :sort_by="$sortColumnBy">User Name</x-table.th>
                                <x-table.th wire:click="sort_column('noofsets')" name="noofsets" :sort="$sortColumn" :sort_by="$sortColumnBy">No of Set</x-table.th>
                                <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($papersubmissions as $papersubmission)
                                <x-table.tr wire:key="{{ $papersubmission->id }}">
                                    <x-table.td>{{ $papersubmission->id }} </x-table.td>
                                    <x-table.td>{{ $papersubmission->exam->exam_name }} </x-table.td>
                                    <x-table.td>{{ $papersubmission->subject->subject_name }} </x-table.td>
                                    <x-table.td>{{ $papersubmission->faculty->faculty_name }} </x-table.td>
                                    <x-table.td>{{ $papersubmission->user->name }} </x-table.td>
                                    <x-table.td>{{ $papersubmission->noofsets }} </x-table.td>
                                    <x-table.td>
                                        @if ($papersubmission->deleted_at)
                                           @elseif($papersubmission->status==1)
                                              <x-table.active wire:click="Status({{ $papersubmission->id }})" />
                                              @else
                                              <x-table.inactive wire:click="Status({{ $papersubmission->id }})" />
                                              @endif
                                      </x-table.td>
                                      <x-table.td>
                                        @if ($papersubmission->deleted_at)
                                        <x-table.delete wire:click="deleteconfirmation({{ $papersubmission->id }})" />
                                        <x-table.restore wire:click="restore({{ $papersubmission->id }})" />
                                        @else
                                        <x-table.edit wire:click="edit({{ $papersubmission->id }})" />
                                        <x-table.archive wire:click="delete({{ $papersubmission->id }})" />
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
                    <x-table.paginate :data="$papersubmissions" />
                </x-slot>
            </x-table.frame>
        </div>
    @endif
</div>

