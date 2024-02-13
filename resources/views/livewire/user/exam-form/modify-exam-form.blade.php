<div>
  @if ($page == 1)
    <div>
      <x-breadcrumb.breadcrumb>
        <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
        <x-breadcrumb.link name="Modify Student Exam Form" />
      </x-breadcrumb.breadcrumb>
      <x-card-header heading="Modify Student Exam Form" />
      <x-form wire:submit="fetch_modify()">
        <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
          <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
            Modify Student Exam Form <x-spinner />
          </div>
          <div class="grid grid-cols-1 md:grid-cols-1">
            <div class="px-5 py-2 col-span-1 text-sm text-gray-600 dark:text-gray-400">
              <x-input-label for="application_id" :value="__('Enter Application ID')" />
              <x-text-input id="application_id" type="text" wire:model="application_id" placeholder="{{ __('Enter Application ID') }}" name="application_id" class="w-full mt-1" :value="old('application_id', $application_id)" autocomplete="application_id" />
              <x-input-error :messages="$errors->get('application_id')" class="mt-1" />
            </div>
          </div>
          <x-form-btn wire:loading.attr="disabled">Find</x-form-btn>
        </div>
    </div>
    </x-form>
</div>
@elseif($page == 2)
<div>
  <x-breadcrumb.breadcrumb>
    <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
    <x-breadcrumb.link name="Inward Exam Form" />
  </x-breadcrumb.breadcrumb>
  <x-form wire:submit="modify_form({{ $modify_id }})">
    <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
      <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Exam Form Regular Inward Process <x-spinner />
      </div>
      <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
        <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
          Student Details
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
          <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="student_name" :value="__('Student Name')" />
            <x-input-show id="student_name" :value="$student_name" />
          </div>
          <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="mother_name" :value="__('Mother Name')" />
            <x-input-show id="mother_name" :value="$mother_name" />
          </div>
          <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="email" :value="__('Course Name')" />
            <x-input-show id="email" :value="$course_name" />
          </div>
          <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="mobile_no" :value="__('Member ID')" />
            <x-input-show id="mobile_no" :value="$memid" />
          </div>
        </div>
      </div>
      <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
        <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
          Fee Details
        </div>
        <x-table.table>
          <x-table.thead>
            <x-table.tr>
              <x-table.th>Head</x-table.th>
              <x-table.th>Previous Fee</x-table.th>
              <x-table.th>New Fee</x-table.th>
              <x-table.th>Modification</x-table.th>
            </x-table.tr>
            @php
              $total = 0;
            @endphp
          </x-table.thead>
          <x-table.tbody>
            @forelse ($student_exam_form_fees as $key => $examformfee)
              <x-table.tr wire:key="{{ $examformfee->id }}">
                <x-table.td>{{ $examformfee->examfee->fee_name }} </x-table.td>
                <x-table.td>{{ $examformfee->fee_amount }} </x-table.td>
                <x-table.td>
                  <div class="px-5 py-2 col-span-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-text-input id="newfees.{{ $examformfee->examfees_id }}" type="number" wire:model.live.debounce.30s="newfees.{{ $examformfee->examfees_id }}" placeholder="{{ __('Enter New ' . $examformfee->examfee->fee_name . '') }}" name="newfees.{{ $examformfee->examfees_id }}" class="w-50 mt" />
                    <x-input-error :messages="$errors->get('newfees.{$examformfee->examfees_id}')" class="mt-1" />
                  </div>
                </x-table.td>
                <x-table.td>
                  @if ($examformfee->fee_amount != $newfees[$examformfee->examfees_id])
                    {{ $examformfee->fee_amount }} --> {{ $newfees[$examformfee->examfees_id] }}
                    @if ($done)
                      <span class="px-2"> Updated</span>
                    @endif
                  @endif
                </x-table.td>
              </x-table.tr>
              @php
                $total = $total + $examformfee->fee_amount;
              @endphp
            @empty
              <x-table.tr>
                <x-table.td colspan="7">
                  <p class="text-center">No Records Found</p>
                </x-table.td>
              </x-table.tr>
            @endforelse
            <x-table.tr>
              <x-table.td class="text-xl font-bold text-red-500">Total </x-table.td>
              <x-table.td class="text-xl font-bold text-red-500">{{ $total }} </x-table.td>
              <x-table.td class="text-xl font-bold text-red-500">{{ $newtotal }} </x-table.td>
            </x-table.tr>
          </x-table.tbody>
        </x-table.table>
      </div>
      <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
        <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
          Subject Details
        </div>
        <x-table.table>
          <x-table.thead>
            <x-table.tr>
              <x-table.th colspan="8">
                <p class="text-center">Regular Subjects</p>
              </x-table.th>
            </x-table.tr>
            <x-table.tr>
              <x-table.th>Year / Sem</x-table.th>
              <x-table.th>Subject Code</x-table.th>
              <x-table.th>Subject Name</x-table.th>
              <x-table.th>Internal</x-table.th>
              <x-table.th>External / Theory </x-table.th>
              <x-table.th>Practical </x-table.th>
              <x-table.th>Grade </x-table.th>
              <x-table.th>Project </x-table.th>
            </x-table.tr>
          </x-table.thead>
          <x-table.tbody>
            @forelse ($student_exam_form_subjects as  $examformsubject)
              <x-table.tr wire:key="{{ $examformsubject->id }}">
                <x-table.td>{{ $examformsubject->subject->subject_sem }} </x-table.td>
                <x-table.td>{{ $examformsubject->subject->subject_code }} </x-table.td>
                <x-table.td>{{ $examformsubject->subject->subject_name }} </x-table.td>

                @if ($examformsubject->subject->subjectexam_type == 'G' || $examformsubject->subject->subjectexam_type == 'IG')
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ $examformsubject->grade_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                @endif
                @if ($examformsubject->subject->subjectexam_type == 'IE')
                  <x-table.td>{{ $examformsubject->int_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ $examformsubject->ext_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                @endif
                @if ($examformsubject->subject->subjectexam_type == 'IEG')
                  <x-table.td>{{ $examformsubject->int_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ $examformsubject->ext_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                @endif
                @if ($examformsubject->subject->subjectexam_type == 'IP' && $examformsubject->subject->subjecttype->type_name != 'Project')
                  <x-table.td>{{ $examformsubject->int_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ $examformsubject->ext_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                @endif
                @if ($examformsubject->subject->subjectexam_type == 'IP' && $examformsubject->subject->subjecttype->type_name == 'Project')
                  <x-table.td>{{ $examformsubject->int_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ $examformsubject->ext_status == 1 ? 'Y' : 'N' }}</x-table.td>
                @endif
                @if ($examformsubject->subject->subjectexam_type == 'I')
                  <x-table.td>{{ $examformsubject->int_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                @endif
                @if ($examformsubject->subject->subjectexam_type == 'IEP')
                  <x-table.td>{{ $examformsubject->int_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ $examformsubject->ext_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ $examformsubject->int_practical_status == 1 ? 'Y' : 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                  <x-table.td>{{ 'N' }}</x-table.td>
                @endif
              </x-table.tr>
            @empty
              <x-table.tr>
                <x-table.td colspan="8">
                  <p class="text-center">No Records Found</p>
                </x-table.td>
              </x-table.tr>
            @endforelse
          </x-table.tbody>
        </x-table.table>
        <x-table.table>
          <x-table.thead>
            <x-table.tr>
              <x-table.th colspan="7">
                <p class="text-center">Extra Credit Subjects</p>
              </x-table.th>
            </x-table.tr>
            <x-table.tr>
              <x-table.th>Year / Sem</x-table.th>
              <x-table.th>Subject Code</x-table.th>
              <x-table.th>Subject Name</x-table.th>
              <x-table.th>Internal</x-table.th>
              <x-table.th>External / Theory </x-table.th>
              <x-table.th>Practical </x-table.th>
              <x-table.th>Grade </x-table.th>
            </x-table.tr>
          </x-table.thead>
          <x-table.tbody>
            @forelse ($student_exam_form_extrcredit_subjects as  $examformextrcreditsubject)
              <x-table.tr wire:key="{{ $examformextrcreditsubject->id }}">
                <x-table.td>{{ '-' }} </x-table.td>
                <x-table.td>{{ $examformextrcreditsubject->subject->subject_code }} </x-table.td>
                <x-table.td>{{ $examformextrcreditsubject->subject->subject_name }} </x-table.td>
                <x-table.td>{{ 'N' }}</x-table.td>
                <x-table.td>{{ 'N' }}</x-table.td>
                <x-table.td>{{ 'N' }}</x-table.td>
                <x-table.td>{{ $examformextrcreditsubject->subject->select_status == 1 ? 'Y' : 'N' }}</x-table.td>
              </x-table.tr>
            @empty
              <x-table.tr>
                <x-table.td colspan="7">
                  <p class="text-center">No Records Found</p>
                </x-table.td>
              </x-table.tr>
            @endforelse
          </x-table.tbody>
        </x-table.table>
      </div>
      <x-form-btn wire:loading.attr="disabled"> <span wire:loading.remove> Update Exam Form</span><span wire:loading> <x-spinner /></span></x-form-btn>
      <x-form-btn type="button" wire:click='resetinput()' wire:loading.attr="disabled">Cancel</x-form-btn>
    </div>
  </x-form>
</div>
@endif
</div>