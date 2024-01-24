<div>
    @if ($mode == 'add')
      <div>
        <x-card-header heading="Add Exam Backlog Fee Course">
          <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="add()">
          @include('livewire.user.exam-backlog-fee-course.exam-backlog-fee-course-form')
        </x-form>
      </div>
    @elseif($mode == 'edit')
      <div>
        <x-card-header heading="Edit Exam Backlog Fee Course">
          <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="update({{ $edit_id }})">
          @include('livewire.user.exam-backlog-fee-course.exam-backlog-fee-course-form')
        </x-form>
      </div>
    @elseif($mode == 'all')
      <div>
        <x-breadcrumb.breadcrumb>
          <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
          <x-breadcrumb.link name="Exam Backlog Fee Course's" />
        </x-breadcrumb.breadcrumb>
        <x-card-header heading="All Exam Backlog Fee Course's">
          <x-add-btn wire:click="setmode('add')" />
        </x-card-header>
        <x-table.frame>
          <x-slot:body>
            <x-table.table>
              <x-table.thead>
                <x-table.tr>
                  <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                  <x-table.th wire:click="sort_column('backlogfee')" name="backlogfee" :sort="$sortColumn" :sort_by="$sortColumnBy">Backlog Fee</x-table.th>
                  <x-table.th wire:click="sort_column('sem')" name="sem" :sort="$sortColumn" :sort_by="$sortColumnBy">Sem</x-table.th>
                  <x-table.th wire:click="sort_column('patternclass_id')" name="patternclass_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Pattern Class</x-table.th>
                  <x-table.th wire:click="sort_column('examfees_id')" name="examfees_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Fee Type</x-table.th>
                  <x-table.th wire:click="sort_column('approve_status')" name="approve_status" :sort="$sortColumn" :sort_by="$sortColumnBy">Approved</x-table.th>
                  <x-table.th wire:click="sort_column('active_status')" name="active_status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
                  <x-table.th> Action </x-table.th>
                </x-table.tr>
              </x-table.thead>
              <x-table.tbody>
                @foreach ($exambacklogfeecourses as $exambacklogfeecourse)
                  <x-table.tr wire:key="{{ $exambacklogfeecourse->id }}">
                    <x-table.td>{{ $exambacklogfeecourse->id }} </x-table.td>
                    <x-table.td>{{ $exambacklogfeecourse->backlogfee }} </x-table.td>
                    <x-table.td>{{ $exambacklogfeecourse->sem }} </x-table.td>
                    <x-table.td> <x-table.text-scroll>{{ isset($exambacklogfeecourse->patternclass->pattern->pattern_name) ? $exambacklogfeecourse->patternclass->pattern->pattern_name : '-' }} {{ isset($exambacklogfeecourse->patternclass->courseclass->classyear->classyear_name) ? $exambacklogfeecourse->patternclass->courseclass->classyear->classyear_name : '-' }} {{ isset($exambacklogfeecourse->patternclass->courseclass->course->course_name) ? $exambacklogfeecourse->patternclass->courseclass->course->course_name : '-' }} </x-table.text-scroll></x-table.td>
                    <x-table.td> <x-table.text-scroll>{{isset($exambacklogfeecourse->examfee->fee_type)? $exambacklogfeecourse->examfee->fee_type:'-'; }} </x-table.text-scroll></x-table.td>
                    <x-table.td>
                      @if ($exambacklogfeecourse->approve_status == 1)
                        <x-status type="success"> Yes </x-status>
                      @else
                        <x-status type="danger"> No </x-status>
                      @endif
                    </x-table.td>
                    <x-table.td>
                      @if ($exambacklogfeecourse->active_status)
                        <x-table.active wire:click="status({{ $exambacklogfeecourse->id }})" />
                      @else
                        <x-table.inactive wire:click="status({{ $exambacklogfeecourse->id }})" />
                      @endif
                    </x-table.td>
                    <x-table.td>
                      @if ($exambacklogfeecourse->deleted_at)
                        <x-table.delete wire:click="deleteconfirmation({{ $exambacklogfeecourse->id }})" />
                        <x-table.restore wire:click="restore({{ $exambacklogfeecourse->id }})" />
                      @else
                        <x-table.edit wire:click="edit({{ $exambacklogfeecourse->id }})" />
                        @if ($exambacklogfeecourse->approve_status == 1)
                          <x-table.reject wire:click="approve({{ $exambacklogfeecourse->id }})" />
                        @else
                          <x-table.approve wire:click="approve({{ $exambacklogfeecourse->id }})" />
                        @endif
                        <x-table.archive wire:click="delete({{ $exambacklogfeecourse->id }})" />
                      @endif
                    </x-table.td>
                  </x-table.tr>
                @endforeach
              </x-table.tbody>
            </x-table.table>
          </x-slot>
          <x-slot:footer>
            <x-table.paginate :data="$exambacklogfeecourses" />
          </x-slot>
        </x-table.frame>
      </div>
    @endif
  </div>
  