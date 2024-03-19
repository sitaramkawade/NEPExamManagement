<div>
  <x-card-header heading="Exam Form Statistics" />
  <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
      {{ $exam->exam_name }} Exam Form Statistics
    </div>
    <div class="overflow-x-scroll">
      <x-table.table>
        <x-table.thead>
          <x-table.tr>
            <x-table.th>ID</x-table.th>
            <x-table.th class="text-start">Pattern Class</x-table.th>
            <x-table.th>Total Students</x-table.th>
            <x-table.th>Incomplete</x-table.th>
            <x-table.th>Yet To Inward</x-table.th>
            <x-table.th>Inward Completed</x-table.th>
            <x-table.th class="text-end">Total Fee Received</x-table.th>
          </x-table.tr>
        </x-table.thead>
        <x-table.tbody>
          @php
            $total_fee = 0;
            $total_student_count = 0;
            $total_incomplete_forms = 0;
            $total_yet_to_inword_forms = 0;
            $total_inword_forms = 0;
          @endphp
          @foreach ($exam->exampatternclasses as $exam_pattern_class)
            @php
              $total_amount = $exam_pattern_class->patternclass->examformmasters->where('exam_id', $exam->id)->where('inwardstatus', 1)->sum('totalfee');
              $total_fee += $total_amount;
              $total_student_count += $exam_pattern_class->patternclass->admissiondatas->where('academicyear_id', $exam->academicyear_id)->groupBy('memid')->count();
              $total_incomplete_forms += $exam_pattern_class->patternclass->examformmasters->where('exam_id', $exam->id)->where('printstatus', 0)->where('inwardstatus', 0)->count();
              $total_yet_to_inword_forms += $exam_pattern_class->patternclass->examformmasters->where('exam_id', $exam->id)->where('printstatus', 1)->where('inwardstatus', 0)->count();
              $total_inword_forms += $exam_pattern_class->patternclass->examformmasters->where('exam_id', $exam->id) ->where('inwardstatus', 1)->count();
              $student_count = $exam_pattern_class->patternclass->admissiondatas->where('academicyear_id', $exam->academicyear_id)->groupBy('memid')->count();
              $incomplete_count = $exam_pattern_class->patternclass->examformmasters->where('exam_id', $exam->id)->where('printstatus', 0)->where('inwardstatus', 0)->count();
              $yet_to_count = $exam_pattern_class->patternclass->examformmasters->where('exam_id', $exam->id)->where('printstatus', 1)->where('inwardstatus', 0)->count();
              $inward_count = $exam_pattern_class->patternclass->examformmasters->where('exam_id', $exam->id)->where('inwardstatus', 1)->count();
            @endphp
            <x-table.tr wire:key="{{ $exam_pattern_class->id }}" class="even:bg-primary even:text-white">
              <x-table.td> {{ $exam_pattern_class->id }}</x-table.td>
              <x-table.td class="text-start">{{ $exam_pattern_class->patternclass->courseclass->classyear->classyear_name }} {{ $exam_pattern_class->patternclass->courseclass->course->course_name }} {{ $exam_pattern_class->patternclass->pattern->pattern_name }}</x-table.td>
              <x-table.td>
                @if ($student_count)
                  <a class="cursor-pointer" href="{{ route('user.exam_form_report_view', ["$exam_pattern_class->id", 4]) }}">
                    <x-table.download class="m-0 p-0">
                      <x-status type="danger">{{ $student_count }} </x-status> 
                    </x-table.download>
                  </a>
                @else
                  <span class="px-3 py-1"> <x-status type="danger">{{ $student_count }} </x-status></span>
                @endif
              </x-table.td>
              <x-table.td>
                @if ($incomplete_count)
                  <a class="cursor-pointer" href="{{ route('user.exam_form_report_view', ["$exam_pattern_class->id", 0]) }}">
                    <x-table.download class="m-0 p-0">
                      <x-status type="danger">{{ $incomplete_count }} </x-status>
                    </x-table.download>
                  </a>
                @else
                  <span class="px-3 py-1"><x-status type="danger"> {{ $incomplete_count }} </x-status></span>
                @endif
              </x-table.td>
              <x-table.td>
                @if ($yet_to_count)
                  <a class="cursor-pointer" href="{{ route('user.exam_form_report_view', ["$exam_pattern_class->id", 1]) }}"> 
                    <x-table.download class="m-0 p-0">
                      <x-status type="danger">{{ $yet_to_count }} </x-status>
                    </x-table.download>
                  </a>
                @else
                  <span class="px-3 py-1"> <x-status type="danger"> {{ $yet_to_count }} </x-status></span>
                @endif
              </x-table.td>
              <x-table.td>
                @if ($inward_count)
                  <a class="cursor-pointer" href="{{ route('user.exam_form_report_view', ["$exam_pattern_class->id", 2]) }}">
                    <x-table.download class="m-0 p-0">
                      <x-status type="danger">{{ $inward_count }} </x-status>
                    </x-table.download>
                  </a>
                @else
                  <span class="px-3 py-1"><x-status type="danger"> {{ $inward_count }} </x-status> </span>
                @endif
              </x-table.td>
              <x-table.td class="text-end"> {{ INR($total_amount) }}</x-table.td>
            </x-table.tr>
          @endforeach
          <x-table.tr>
            <x-table.td colspan="7">&nbsp;</x-table.td>
          </x-table.tr>
          <x-table.tr class="h-10">
            <x-table.td class="font-bold text-md text-start" colspan="2"> TOTAL</x-table.td>
            <x-table.td><span class="font-bold text-md px-3 py-1"> {{ number_format($total_student_count) }} </span></x-table.td>
            <x-table.td><span class="font-bold text-md px-3 py-1"> {{ number_format($total_incomplete_forms) }} </span></x-table.td>
            <x-table.td><span class="font-bold text-md px-3 py-1"> {{ number_format($total_yet_to_inword_forms) }} </span></x-table.td>
            <x-table.td><span class="font-bold text-md px-3 py-1"> {{ number_format($total_inword_forms) }} </span></x-table.td>
            <x-table.td class="font-bold text-md text-end"> {{ INR($total_fee) }}</x-table.td>
          </x-table.tr>
        </x-table.tbody>
      </x-table.table>
    </div>
  </div>
</div>
</div>
