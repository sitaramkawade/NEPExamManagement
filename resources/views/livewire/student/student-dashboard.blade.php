<section>
  <section>
    <div class="p-4">
      <div class="mx-auto">
        <div class="mb-5 rounded-3xl bg-white p-5 dark:bg-darker">

          <div class="relative flex overflow-x-hidden">
            <p class="animate-marquee whitespace-nowrap">
              परीक्षेसंदर्भात परीक्षा विभागाकडून महाविद्यालयाच्या काचफलक / वेबसाईट वर प्रसिद्द केलेल्या वेळापत्रका प्रमाणे सर्व विद्यार्थ्यांनी परीक्षा द्यावी , याकरिता विद्यार्थानी दररोज महाविद्यालयाचे काचफलक / वेबसाईटवर वेळापत्रक पहाणे गरजेचे असून ती जबाबदारी संबंधित विद्यार्थ्यांची राहील .
            </p>
          </div>
          <hr class="my-5">
          <div class="grid grid-cols-1 gap-10 md:grid-cols-2">
            <div>
              <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                  <div class="rounded-xl border-2 bg-green-100 p-3 dark:border-primary dark:bg-green-500 ">
                    <div class="text-lg font-bold leading-none text-gray-800">Action</div>
                    <div class="mt-2">
                      <div class="grid grid-cols-3 gap-1 md:grid-cols-4 ">
                        <a href="{{ route('student.student_exam_form') }}">
                          <button type="button" class="inline-flex items-center justify-center rounded-xl border-2 bg-white px-3 py-2 my-2 text-md font-semibold text-gray-800 transition hover:text-green-500 dark:border-primary">
                            Exam Form
                          </button>
                        </a>
                        <button type="button" class="inline-flex items-center justify-center rounded-xl border-2 bg-white px-3 py-2 my-2 text-md font-semibold text-gray-800 transition hover:text-green-500 dark:border-primary">
                          Hall Tiket
                        </button>
                        <button type="button" class="inline-flex items-center justify-center rounded-xl border-2 bg-white px-3 py-2 my-2 text-md font-semibold text-gray-800 transition hover:text-green-500 dark:border-primary">
                          Result
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="rounded-xl border-2 bg-yellow-100 p-4 text-gray-800 dark:border-primary dark:bg-yellow-500">
                  <div class="text-lg font-bold leading-none">Learning Mode</div>
                  <div class="mt-4 space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                    <span class="font-bold">Regular</span>
                  </div>
                </div>
                <div class="rounded-xl border-2 bg-yellow-100 p-4 text-gray-800 dark:border-primary dark:bg-yellow-500">
                  <div class="text-lg font-bold leading-none">Profile Status</div>
                  <div class="mt-4 space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                    @if (auth()->guard()->user()->is_profile_complete)
                      <span class="font-bold">Complete
                        <a href="{{ route('student.view-profile') }}" wire:navigate class="rounded-md bg-primary float-right px-1 text-white">View</a>
                      </span>
                    @else
                      <span class="font-bold">Incomplete</span>
                    @endif
                  </div>
                </div>
                <div class="space-y-4">
                  <div class="space-y-2 rounded-xl border-2 bg-red-100 px-3 py-2 text-gray-800 dark:border-primary dark:bg-blue-400">
                    <div class="flex justify-between">
                      <span class="font-bold">Major Subject</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold">XYZ</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold">XYZ</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold">XYZ</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold">XYZ</span>
                    </div>
                  </div>
                </div>
                <div class="space-y-4">
                  <div class="space-y-2 rounded-xl border-2 bg-red-100 px-3 py-2 text-gray-800 dark:border-primary dark:bg-cyan-400">
                    <div class="flex justify-between">
                      <span class="font-bold">Minor Subject</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold">ABC</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold">ABC</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold">ABC</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold">ABC</span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div>
              <div class="space-y-4">
                <div class="space-y-2 rounded-xl border-2 bg-pink-100 px-3 py-2 text-gray-800 dark:border-primary dark:bg-pink-500">
                  <div class="flex justify-between">
                    <span class="font-bold">Personal Information</span>
                  </div>
                  <div class="grid grid-cols-3">
                    <div>
                      <div class="relative h-auto">
                        <div class=" text-sm text-gray-600 dark:text-gray-400 ">
                          <div class="flex flex-col items-center mx-auto   ">
                            <div class="shrink-0 p-2">
                              <img style="width: 135px; height: 145px;" class="object-center object-fill "src="{{ isset(Auth::guard('student')->user()->studentprofile->profile_photo_path) ? asset(auth()->user()->studentprofile->profile_photo_path) : asset('img/no-img.png') }}" alt="Profile Photo" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="grid grid-cols-1 col-span-2 gap-2">
                      <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                        <span class="font-bold">PRN : {{ Auth::guard('student')->user()->prn ?? 'N.A.' }} </span>
                      </div>
                      <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                        <span class="font-bold">Member ID : {{ Auth::guard('student')->user()->memid ?? 'N.A.' }} </span>
                      </div>
                      <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                        <span class="font-bold">Eligibility No : {{ Auth::guard('student')->user()->eligibilityno ?? 'N.A.' }} </span>
                      </div>
                    </div>
                  </div>
                  <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                    <span class="font-bold">Name : {{ Auth::guard('student')->user()->student_name }} </span>
                  </div>
                  <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                    <span class="font-bold">Mother Name : {{ Auth::guard('student')->user()->mother_name ?? 'N.A.' }}</span>
                  </div>
                </div>
                <div class="space-y-4">
                  <div class="space-y-2 rounded-xl border-2 bg-red-100 px-3 py-2 text-gray-800 dark:border-primary dark:bg-red-400">
                    <div class="flex justify-between">
                      <span class="font-bold">Course Enrollment</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold">Pattern : {{ Auth::guard('student')->user()->patternclass->pattern->pattern_name }}</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold"> Course : {{ Auth::guard('student')->user()->patternclass->getclass->course->course_name }}</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold">Current Class : {{ Auth::guard('student')->user()->patternclass->getclass->classyear->classyear_name }} {{ Auth::guard('student')->user()->patternclass->getclass->course->course_name }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-2 py-4">
            <div class="rounded-xl border-2 bg-purple-100 p-4 text-gray-800 dark:border-primary dark:bg-purple-500">
              <div class="text-lg font-bold leading-none">Non CGPA Extra Mandatory Credits</div>
              <div class="grid grid-cols-3 gap-2">
                <div class="mt-2 space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                  <span class="font-bold">Total : 12....</span>
                </div>
                <div class="mt-2 space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                  <span class="font-bold">Earned : 5....
                    {{-- {{$student->getNONCGPAtotal()}} --}}
                  </span>
                </div>
                <div class="mt-2 space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                  <span class="font-bold">Remaining : 7...
                    {{-- @if ($student->patternclass->coursepatternclasses->course->course_type == 'UG')
                    {{(8-$student->getNONCGPAtotal())>0?(8-$student->getNONCGPAtotal()):"0"}}
                    @endif
                    @if ($student->patternclass->coursepatternclasses->course->course_type == 'PG')
                    {{(12-$student->getNONCGPAtotal())>0?(12-$student->getNONCGPAtotal()):"0"}}
                    @endif --}}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

  </section>
</section>
