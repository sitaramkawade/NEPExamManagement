<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading="Add Subject">
                <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="save()">
            @include('livewire.faculty.subject.subject-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Subject">
            <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $subject_id }})">
        @include('livewire.faculty.subject.subject-form')
    </x-form>
    @elseif($mode='all')
        <div>
            <x-card-header heading="All Subjects">
                    <x-add-btn wire:click="setmode('add')" />
            </x-card-header>
            <x-table.frame>
                <x-slot:header>
                </x-slot>
                <x-slot:body>
                  <x-table.table>
                    <x-table.thead>
                      <x-table.tr>
                        <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                        <x-table.th wire:click="sort_column('subject_name')" name="subject_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Name</x-table.th>
                        <x-table.th wire:click="sort_column('subject_credit')" name="subject_credit" :sort="$sortColumn" :sort_by="$sortColumnBy">Credit</x-table.th>
                        <x-table.th wire:click="sort_column('mobile_no')" name="mobile_no" :sort="$sortColumn" :sort_by="$sortColumnBy">Department</x-table.th>
                        <x-table.th>Pattern</x-table.th>
                        <x-table.th>Course</x-table.th>
                        <x-table.th>Course Class</x-table.th>
                        <x-table.th wire:click="sort_column('college_id')" name="college_id" :sort="$sortColumn" :sort_by="$sortColumnBy">College</x-table.th>
                        <x-table.th> Action </x-table.th>
                      </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                      @foreach ($subjects as $subject)
                        <x-table.tr wire:key="{{ $subject->id }}">
                          <x-table.td>{{ $subject->id }} </x-table.td>
                          <x-table.td> {{ $subject->subject_name }} </x-table.td>
                          <x-table.td> {{ $subject->subject_credit }} </x-table.td>
                          <x-table.td> {{ $subject->department->dept_name ?? '' }} </x-table.td>
                          <x-table.td> {{ $subject->patternclass->pattern->pattern_name ?? '' }} </x-table.td>
                          <x-table.td> {{ $subject->patternclass->courseclass->course->course_name ?? '' }} </x-table.td>
                          <x-table.td> {{ $subject->patternclass->courseclass->classyear->classyear_name ?? '' }} </x-table.td>
                          <x-table.td> {{ $subject->college->college_name ?? '' }} </x-table.td>
                          <x-table.td>
                            @if ($subject->deleted_at)
                                <x-table.restore wire:click="restore({{ $subject->id }})" />
                                <x-table.delete wire:click="deleteconfirmation({{ $subject->id }})" />
                            @else
                                <x-table.edit wire:click="edit({{ $subject->id }})" />
                                <x-table.archive wire:click="softdelete({{ $subject->id }})" />
                                {{-- @if ($subject->status == 0)
                                    <x-table.active wire:click="status({{ $subject->id }})" />
                                @elseif ($subject->status == 1)
                                    <x-table.inactive wire:click="status({{ $subject->id }})" />
                                @elseif ($subject->status == 3)
                                    <x-table.active wire:click="status({{ $subject->id }})" />
                                @endif
                                <x-table.archive wire:click="delete({{ $subject->id }})" /> --}}
                            @endif
                          </x-table.td>
                        </x-table.tr>
                      @endforeach
                    </x-table.tbody>
                  </x-table.table>
                </x-slot>
                <x-slot:footer>
                  <x-table.paginate :data="$subjects" />
                </x-slot>
              </x-table.frame>
        </div>
    @endif
</div>
