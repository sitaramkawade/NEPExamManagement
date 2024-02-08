<section>
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
                <div class="grid grid-cols-3  md:grid-cols-3 ">
                  <x-dashboard.form-button action="{{ route('student.student_exam_form') }}"> Exam Form </x-dashboard.form-button>
                  <x-dashboard.form-button action="{{ route('student.student_delete_exam_form') }}"> Delete Exam Form </x-dashboard.form-button>

                </div>
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
                          <img style="width: 135px; height: 145px;" class="object-center object-fill "src="{{ isset($student->studentprofile->profile_photo_path) ? asset(auth()->user()->studentprofile->profile_photo_path) : asset('img/no-img.png') }}" alt="Profile Photo" />
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
    </div>
  </div>
</section>
