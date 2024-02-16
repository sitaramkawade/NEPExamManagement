<div>
  @if ($mode == 'all')
    <div>
      <x-breadcrumb.breadcrumb>
        <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
        <x-breadcrumb.link name="Exam Form's" />
      </x-breadcrumb.breadcrumb>
      <x-card-header heading="All Exam Form's" />
      <x-table.frame>
        <x-slot:body>
          <x-table.table>
            <x-table.thead>
              <x-table.tr>
                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                <x-table.th wire:click="sort_column('exam_id')" name="exam_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Academic Year</x-table.th>
                <x-table.th wire:click="sort_column('student_id')" name="student_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Student Name</x-table.th>
                <x-table.th wire:click="sort_column('student_id')" name="student_id" :sort="$sortColumn" :sort_by="$sortColumnBy">PRN</x-table.th>
                <x-table.th wire:click="sort_column('student_id')" name="student_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Member ID</x-table.th>
                <x-table.th wire:click="sort_column('totalfee')" name="totalfee" :sort="$sortColumn" :sort_by="$sortColumnBy">Amount</x-table.th>
                <x-table.th wire:click="sort_column('feepaidstatus')" name="feepaidstatus" :sort="$sortColumn" :sort_by="$sortColumnBy">Fee Paid</x-table.th>
                <x-table.th wire:click="sort_column('inwardstatus')" name="inwardstatus" :sort="$sortColumn" :sort_by="$sortColumnBy">Inward</x-table.th>
                <x-table.th wire:click="sort_column('transaction_id')" name="transaction_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Payment ID</x-table.th>
                <x-table.th wire:click="sort_column('transaction_id')" name="transaction_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Payment Date</x-table.th>
                <x-table.th wire:click="sort_column('exam_id')" name="exam_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam</x-table.th>
                <x-table.th wire:click="sort_column('patternclass_id')" name="patternclass_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Pattern Class</x-table.th>
                <x-table.th wire:click="sort_column('created_at')" name="created_at" :sort="$sortColumn" :sort_by="$sortColumnBy">Form Date</x-table.th>
              </x-table.tr>
            </x-table.thead>
            <x-table.tbody>
              @forelse ($exam_form_masters as $key => $examformmaster)
                <x-table.tr wire:key="{{ $examformmaster->id }}">
                  <x-table.td>{{ $examformmaster->id }} </x-table.td>
                  <x-table.td>{{ isset($examformmaster->exam->academicyear->year_name)?$examformmaster->exam->academicyear->year_name:''; }} </x-table.td>
                  <x-table.td> <x-table.text-scroll> {{ isset($examformmaster->student->student_name) ? $examformmaster->student->student_name : '' }} </x-table.text-scroll> </x-table.td>
                  <x-table.td>{{ isset($examformmaster->student->prn)?$examformmaster->student->prn:''; }} </x-table.td>
                  <x-table.td>{{ isset($examformmaster->student->memid)?$examformmaster->student->memid:''; }} </x-table.td>
                  <x-table.td>{{ $examformmaster->totalfee }} </x-table.td>
                  <x-table.td>
                    @if ($examformmaster->feepaidstatus)
                      <x-status type="success">Paid</x-status>
                      @if (isset($examformmaster->transaction->status))
                        @if ($examformmaster->transaction->status == 3)
                          <x-status type="success"> Online </x-status>
                        @endif
                      @else
                        <x-status type="danger">Offline</x-status>
                      @endif
                    @else
                      <x-status type="danger">Not Paid</x-status>
                    @endif
                  </x-table.td>
                  <x-table.td>
                    @if ($examformmaster->inwardstatus)
                      <x-status type="success">Yes</x-status>
                    @else
                      <x-status type="dander">No</x-status>
                    @endif
                  </x-table.td>
                  <x-table.td>
                    @if (isset($examformmaster->transaction_id))
                      @if ($examformmaster->transaction->status == 3)
                        <x-status> {{ isset($examformmaster->transaction->razorpay_payment_id) ? $examformmaster->transaction->razorpay_payment_id : '' }}</x-status>
                      @endif
                    @endif
                  </x-table.td>
                  <x-table.td>
                    @if (isset($examformmaster->transaction->status))
                      @if ($examformmaster->transaction->status == 3)
                        <x-status> {{ isset($examformmaster->transaction->payment_date) ? $examformmaster->transaction->payment_date : '' }}</x-status>
                      @endif
                    @endif
                  </x-table.td>
                  <x-table.td> <x-table.text-scroll> {{ $examformmaster->exam->exam_name }} </x-table.text-scroll></x-table.td>
                  <x-table.td> <x-table.text-scroll> {{ isset($examformmaster->patternclass->pattern->pattern_name)?$examformmaster->patternclass->pattern->pattern_name:''; }} {{ isset($examformmaster->patternclass->courseclass->classyear->classyear_name)?$examformmaster->patternclass->courseclass->classyear->classyear_name:''; }} {{ isset($examformmaster->patternclass->courseclass->course->course_name)?$examformmaster->patternclass->courseclass->course->course_name:''; }} </x-table.text-scroll></x-table.td>
                  <x-table.td>{{ isset($examformmaster->created_at) ? $examformmaster->created_at->format('Y-m-d') : ''; }} </x-table.td>
                </x-table.tr>
              @empty
                <x-table.tr>
                  <x-table.td colspan="13">
                    <p class="text-center">No Records Found</p>
                  </x-table.td>
                </x-table.tr>
              @endforelse
            </x-table.tbody>
          </x-table.table>
        </x-slot>
        <x-slot:footer>
          <x-table.paginate :data="$exam_form_masters" />
        </x-slot>
      </x-table.frame>
    </div>
  @endif
</div>
