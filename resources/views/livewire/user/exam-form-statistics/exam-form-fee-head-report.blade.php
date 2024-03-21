<div>
  <div>
    <x-breadcrumb.breadcrumb>
      <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
      <x-breadcrumb.link name="Exam Form Fee Head Statistics" />
    </x-breadcrumb.breadcrumb>
    <x-card-header heading="{{ isset($active_exam->exam_name)?$active_exam->exam_name:''; }} Exam Form Fee Head Statistics" />
    <x-table.frame s="0" x="0">
      <x-slot:header>
        <div class="w-full inline">
          <x-input-select id="pattern_class_id" wire:model.live="pattern_class_id" name="pattern_class_id" class="text-center  w-[80%] max-w-[80%] h-8.5 mt-1">
            <x-select-option class="text-start" hidden>-- Select Exam Pattern Class --</x-select-option>
            @foreach ($exampatternclasses as $epc_id => $pc_id)
              <x-select-option wire:key="{{ $epc_id }}" value="{{ $pc_id }}" class="text-start">{{ get_pattern_class_name($pc_id) }} </x-select-option>
            @endforeach
          </x-input-select>
          <span class="py-2">
            <x-table.cancel class="p-2" wire:click='clear()' i="0"> Clear</x-table.cancel>
          </span>

        </div>
      </x-slot>
      <x-slot:body>
        @foreach ($exam_pattern_classes as $exam_pattern_class)
          @php
            $examfeecourses = App\Models\Examfeecourse::where('patternclass_id', $exam_pattern_class->patternclass_id)->where('active_status', 1)->orderBy('examfees_id', 'ASC')->orderBy('sem', 'ASC')->get();
          @endphp

          <x-card-collapsible heading=" {{ get_pattern_class_name($exam_pattern_class->patternclass_id) }}" on="0">
            <div>
              <x-table.table>
                <x-table.thead>
                  <x-table.tr>
                    <x-table.th>ID</x-table.th>
                    <x-table.th>Head</x-table.th>
                    <x-table.th class="text-end">Fee</x-table.th>
                    <x-table.th>Count</x-table.th>
                    <x-table.th class="text-end">Total Fee</x-table.th>
                  </x-table.tr>
                </x-table.thead>
                <x-table.tbody>
                  @php
                    $total_fee=0;
                  @endphp
                  @foreach ($examfeecourses as $exam_fee_coures)
                  @php
                    $form_count=App\Models\Studentexamformfee::whereIn('examformmaster_id', $exam_pattern_class->patternclass->examformmasters->where('inwardstatus',1)->pluck('id'))->where('examfees_id', $exam_fee_coures->examfees_id)->count();
                    $fee_count = App\Models\Studentexamformfee::whereIn('examformmaster_id', $exam_pattern_class->patternclass->examformmasters->where('inwardstatus',1)->pluck('id'))->where('examfees_id', $exam_fee_coures->examfees_id)->sum('fee_amount');
                    $total_fee+= $fee_count;
                  @endphp
                    <x-table.tr>
                      <x-table.td>{{ $exam_fee_coures->examfees_id }}</x-table.td>
                      <x-table.td>
                        @if ($exam_fee_coures->sem)
                          {{ 'SEM-' . $exam_fee_coures->sem }}
                        @endif {{ $exam_fee_coures->examfee->fee_name }}
                      </x-table.td>
                      <x-table.td class="text-end">{{ INR($exam_fee_coures->fee) }}</x-table.td>
                      <x-table.td>{{ $form_count }}</x-table.td>
                      <x-table.td class="text-end">{{ INR($fee_count )}}</x-table.td>
                    </x-table.tr>
                  @endforeach
                  <x-table.tr>
                    <x-table.td colspan="4">Total Fee Received</x-table.td>
                    <x-table.td class="text-end">{{ INR($total_fee) }}</x-table.td>
                  </x-table.tr>
                </x-table.tbody>
              </x-table.table>
            </div>
          </x-card-collapsible>
        @endforeach
      </x-slot>
      <x-slot:footer>
        <x-table.paginate :data="$exam_pattern_classes" />
      </x-slot>
    </x-table.frame>
  </div>
</div>
