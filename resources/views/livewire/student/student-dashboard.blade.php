<section>
  <x-alert/>
  <div class="p-4">
    <div class="mx-auto">
      <div class="mb-5 rounded-3xl bg-white p-5 dark:bg-darker">
        <x-marquee>
          परीक्षेसंदर्भात परीक्षा विभागाकडून महाविद्यालयाच्या काचफलक / वेबसाईट वर प्रसिद्द केलेल्या वेळापत्रका प्रमाणे सर्व विद्यार्थ्यांनी परीक्षा द्यावी , याकरिता विद्यार्थानी दररोज महाविद्यालयाचे काचफलक / वेबसाईटवर वेळापत्रक पहाणे गरजेचे असून ती जबाबदारी संबंधित विद्यार्थ्यांची राहील .
        </x-marquee>
        <hr class="my-5">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-2">
          <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
              <x-dashboard.card heading="Action" class="dark:bg-green-500  bg-green-100">
                <x-dashboard.inner-card heading="Exam Form">
                  <x-dashboard.form-button class="bg-purple-500"  action="{{ route('student.student_exam_form') }}"> Exam Form </x-dashboard.form-button>
                  <x-dashboard.form-button class="bg-red-500" action="{{ route('student.student_delete_exam_form') }}"> Delete Exam Form </x-dashboard.form-button>
                  <x-dashboard.form-button class="bg-pink-500" target="_blank" action="{{ route('student.student_print_preview_exam_form') }}"> Preview Exam Form </x-dashboard.form-button>
                  <x-dashboard.form-button class="bg-blue-500" target="_blank" action="{{ route('student.student_print_final_exam_form') }}" onclick="return confirm('Once Printed, the form cannot be edited. Confirm if you wish to print it.')"> Print Exam Form </x-dashboard.form-button>
                </x-dashboard.inner-card>
              </x-dashboard.card>
            </div>
            <x-dashboard.card heading="Learning Mode" class=" dark:bg-yellow-500 bg-yellow-100">
              <x-dashboard.card-item> Regular </x-dashboard.card-item>
            </x-dashboard.card>
            <x-dashboard.card heading="Profile Status" class=" dark:bg-yellow-500 bg-yellow-100">
              <x-dashboard.card-item>
                @if ($student->is_profile_complete)
                  Complete <a href="{{ route('student.view-profile') }}" wire:navigate class="rounded-md bg-primary float-right px-1 text-white">View</a>
                @else
                  Incomplete
                @endif
              </x-dashboard.card-item>
            </x-dashboard.card>
            <x-dashboard.card heading="Major Subject" class=" dark:bg-blue-400 bg-blue-100">
              <x-dashboard.card-item> XYZ </x-dashboard.card-item>
              <x-dashboard.card-item> XYZ </x-dashboard.card-item>
              <x-dashboard.card-item> XYZ </x-dashboard.card-item>
              <x-dashboard.card-item> XYZ </x-dashboard.card-item>
            </x-dashboard.card>
            <x-dashboard.card heading="Major Subject" class=" dark:bg-cyan-400 bg-cyan-100">
              <x-dashboard.card-item> ABC </x-dashboard.card-item>
              <x-dashboard.card-item> ABC </x-dashboard.card-item>
              <x-dashboard.card-item> ABC </x-dashboard.card-item>
              <x-dashboard.card-item> ABC </x-dashboard.card-item>
            </x-dashboard.card>
          </div>
          <div>
            <div class="space-y-4">
              <x-dashboard.card heading="Personal Information" class=" dark:bg-pink-500 bg-pink-100">
                <div class="grid grid-cols-3">
                  <div class="relative h-auto">
                    <div class=" text-sm text-gray-600 dark:text-gray-400 ">
                      <div class="flex flex-col items-center mx-auto   ">
                        <div class="shrink-0 p-2">
                          <img style="width: 135px; height: 145px;" class="object-center object-fill" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path(isset($student->studentprofile->profile_photo_path) ? auth()->user()->studentprofile->profile_photo_path : 'img/no-img.png'))) }}"  alt="Profile Photo" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="grid grid-cols-1 col-span-2 gap-2">
                    <x-dashboard.card-item> PRN : {{ $student->prn ?? 'N.A.' }} </x-dashboard.card-item>
                    <x-dashboard.card-item> Member ID : {{ $student->memid ?? 'N.A.' }} </x-dashboard.card-item>
                    <x-dashboard.card-item> Eligibility No : {{ $student->eligibilityno ?? 'N.A.' }} </x-dashboard.card-item>
                  </div>
                </div>
                <x-dashboard.card-item> Name : {{ $student->student_name ?? 'N.A.' }} </x-dashboard.card-item>
                <x-dashboard.card-item> Mother Name : {{ $student->mother_name ?? 'N.A.' }} </x-dashboard.card-item>
              </x-dashboard.card>
              <x-dashboard.card heading="Course Enrollment" class=" dark:bg-red-400 bg-red-100">
                <x-dashboard.card-item> Pattern : {{ isset($student->patternclass->pattern->pattern_name) ? $student->patternclass->pattern->pattern_name : '' }} </x-dashboard.card-item>
                <x-dashboard.card-item> Course : {{ isset($student->patternclass->courseclass->course->course_name) ? $student->patternclass->courseclass->course->course_name : '' }} </x-dashboard.card-item>
                <x-dashboard.card-item> Current Class : {{ isset($student->patternclass->courseclass->classyear->classyear_name) ? $student->patternclass->courseclass->classyear->classyear_name : '' }} {{ isset($student->patternclass->getclass->course->course_name) ? $student->patternclass->getclass->course->course_name : '' }} </x-dashboard.card-item>
              </x-dashboard.card>
            </div>
          </div>
        </div>
        <div class="col-span-2 py-4">
          <x-dashboard.card heading="Non CGPA Extra Mandatory Credits" class=" dark:bg-purple-500 bg-purple-100">
            <div class="grid grid-cols-3 gap-2">
              <x-dashboard.card-item> Total : 12 </x-dashboard.card-item>
              <x-dashboard.card-item> Earned : 5 </x-dashboard.card-item>
              <x-dashboard.card-item> Remaining : 7 </x-dashboard.card-item>
            </div>
          </x-dashboard.card>
        </div>
      </div>
      @if (!$exam_form_masters->isEmpty())
      <section>
        <x-table.table>
          <x-table.thead>
            <x-table.tr>
              <x-table.th colspan="6">
                <p class="text-center">Fee Section</p>
              </x-table.th>
            </x-table.tr>
            <x-table.tr>
              <x-table.th>No.</x-table.th>
              <x-table.th>Exam Name</x-table.th>
              <x-table.th>Total Fee</x-table.th>
              <x-table.th>Fee Status</x-table.th>
              <x-table.th>Payment Status</x-table.th>
              <x-table.th>Action</x-table.th>
            </x-table.tr>
          </x-table.thead>
          <x-table.tbody>
            @foreach ($exam_form_masters as $key => $exm_form)
              <x-table.tr>
                <x-table.td>{{ $key + 1 }} </x-table.td>
                <x-table.td>{{ $exm_form->exam->exam_name }}</x-table.td>
                <x-table.td>{{ $exm_form->totalfee }} Rs.</x-table.td>
                <x-table.td>
                  @if ($exm_form->feepaidstatus)
                    <x-status type="success"> Paid</x-status>
                    @if ( isset($exm_form->transaction->status) && $exm_form->transaction->status === 3)
                      <x-status type="success"> Online</x-status>
                    @else
                      <x-status type="danger">Offline</x-status>
                    @endif
                  @else
                    <x-status type="danger">Not Paid</x-status>
                  @endif
                </x-table.td>
                <x-table.td>
                  @if (isset($exm_form->transaction->status))
                    @if ($exm_form->transaction->status === 3)
                      <x-status type="success"> Success</x-status>
                    @elseif ($exm_form->transaction->status === 4)
                      <x-status type="info">Refunded</x-status>
                    @elseif ($exm_form->transaction->status === 5)
                      <x-status type="danger">Failed</x-status>
                    @elseif ($exm_form->transaction->status === 1)
                      <x-status>Order Created</x-status>
                    @elseif ($exm_form->transaction->status === 2)
                      <x-status type="warning">Processing</x-status>
                    @endif
                  @else
                    <x-status>NA</x-status>
                  @endif
                </x-table.td>
                <x-table.td>
                  @if ($exm_form->verified_at)
                    @if ($exm_form->feepaidstatus == 0)
                      <x-dashboard.form-button class="bg-green-500 h-7 rounded-md border-none" action="{{ route('student.student_pay_exam_form_fee', $exm_form->id) }}"> Pay Exam Form Fee Online</x-dashboard.form-button>
                    @endif
                  @endif
                  @if (isset($exm_form->transaction->status) && $exm_form->transaction->status === 3)
                    {{-- <x-dashboard.form-button class="bg-blue-500 h-7 rounded-md border-0" target="_blank" action="{{ route('student.student_refund_exam_form',$exm_form->id) }}" > Refund </x-dashboard.form-button> --}}
                  @endif
                </x-table.td>
              </x-table.tr>
            @endforeach
          </x-table.tbody>
        </x-table.table>
      </section>
      @endif
    </div>
  </div>
</section>
