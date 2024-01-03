{{-- <div>
    <!-- Content header -->
    <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
      <h1 class="text-2xl font-semibold">Dashboard</h1>
      <a href="https://github.com/Kamona-WD/kwd-dashboard" target="_blank"
        class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
        View on github
      </a>
    </div>

    <!-- Content -->
    <div class="mt-2">
      <!-- State cards -->
      <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
        <!-- Value card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
          <div>
            <h6
              class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
              Value
            </h6>
            <span class="text-xl font-semibold">$30,000</span>
            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
              +4.4%
            </span>
          </div>
          <div>
            <span>
              <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </span>
          </div>
        </div>

        <!-- Users card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
          <div>
            <h6
              class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
              Users
            </h6>
            <span class="text-xl font-semibold">50,021</span>
            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
              +2.6%
            </span>
          </div>
          <div>
            <span>
              <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </span>
          </div>
        </div>

        <!-- Orders card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
          <div>
            <h6
              class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
              Orders
            </h6>
            <span class="text-xl font-semibold">45,021</span>
            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
              +3.1%
            </span>
          </div>
          <div>
            <span>
              <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg>
            </span>
          </div>
        </div>

        <!-- Tickets card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
          <div>
            <h6
              class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
              Tickets
            </h6>
            <span class="text-xl font-semibold">20,516</span>
            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
              +3.1%
            </span>
          </div>
          <div>
            <span>
              <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
              </svg>
            </span>
          </div>
        </div>
      </div>

      <!-- Charts -->
      <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
        <!-- Bar chart card -->
        <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
          <!-- Card header -->
          <div class="flex items-center justify-between p-4 border-b dark:border-primary">
            <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Bar Chart</h4>
            <div class="flex items-center space-x-2">
              <span class="text-sm text-gray-500 dark:text-light">Last year</span>
              <button class="relative focus:outline-none" x-cloak
                @click="isOn = !isOn; $parent.updateBarChart(isOn)">
                <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                </div>
                <div
                  class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                  :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                </div>
              </button>
            </div>
          </div>
          <!-- Chart -->
          <div class="relative p-4 h-72">
            <canvas id="barChart"></canvas>
          </div>
        </div>

        <!-- Doughnut chart card -->
        <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
          <!-- Card header -->
          <div class="flex items-center justify-between p-4 border-b dark:border-primary">
            <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Doughnut Chart</h4>
            <div class="flex items-center">
              <button class="relative focus:outline-none" x-cloak
                @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)">
                <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                </div>
                <div
                  class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                  :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                </div>
              </button>
            </div>
          </div>
          <!-- Chart -->
          <div class="relative p-4 h-72">
            <canvas id="doughnutChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Two grid columns -->
      <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
        <!-- Active users chart -->
        <div class="col-span-1 bg-white rounded-md dark:bg-darker">
          <!-- Card header -->
          <div class="p-4 border-b dark:border-primary">
            <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Active users right now</h4>
          </div>
          <p class="p-4">
            <span class="text-2xl font-medium text-gray-500 dark:text-light" id="usersCount">0</span>
            <span class="text-sm font-medium text-gray-500 dark:text-primary">Users</span>
          </p>
          <!-- Chart -->
          <div class="relative p-4">
            <canvas id="activeUsersChart"></canvas>
          </div>
        </div>

        <!-- Line chart card -->
        <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
          <!-- Card header -->
          <div class="flex items-center justify-between p-4 border-b dark:border-primary">
            <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Line Chart</h4>
            <div class="flex items-center">
              <button class="relative focus:outline-none" x-cloak
                @click="isOn = !isOn; $parent.updateLineChart()">
                <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                </div>
                <div
                  class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                  :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                </div>
              </button>
            </div>
          </div>
          <!-- Chart -->
          <div class="relative p-4 h-72">
            <canvas id="lineChart"></canvas>
          </div>
        </div>
      </div>
    </div>
</div> --}}

<section>

  {{-- <section>
    <div class="p-0">
      <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
        <div class="relative flex overflow-x-hidden">
          <p class="animate-marquee whitespace-nowrap py-3">
            परीक्षेसंदर्भात परीक्षा विभागाकडून महाविद्यालयाच्या काचफलक / वेबसाईट वर प्रसिद्द केलेल्या वेळापत्रका प्रमाणे सर्व विद्यार्थ्यांनी परीक्षा द्यावी , याकरिता विद्यार्थानी दररोज महाविद्यालयाचे काचफलक / वेबसाईटवर वेळापत्रक पहाणे गरजेचे असून ती जबाबदारी संबंधित विद्यार्थ्यांची राहील .
          </p>
        </div>
        <div>
          <x-table.table>
            <x-table.thead>
              <x-table.tr>
                <x-table.th>No </x-table.th>
                <x-table.th>LEARNING MODE </x-table.th>
                <x-table.th>COURSE ENROLLMENT </x-table.th>
                <x-table.th>PERSONAL INFORMATION</x-table.th>
                <x-table.th>PROFILE STATUS</x-table.th>
                <x-table.th>ACTION</x-table.th>
              </x-table.tr>
            </x-table.thead>
            <x-table.tbody>
              <x-table.tr>
                <x-table.td>1</x-table.td>
                <x-table.td>Regular</x-table.td>
                <x-table.td>{{ Auth::guard("student")->user()->patternclass->getclass->course->course_name }}</x-table.td>
                <x-table.td>
                  Student Name :{{ Auth::guard("student")->user()->student_name }} <br>
                  Student PRN : {{ Auth::guard("student")->user()->prn ?? "N.A." }} <br>
                  Mother Name : {{ Auth::guard("student")->user()->mother_name ?? "N.A." }} <br>
                </x-table.td>
                <x-table.td> {{ Auth::guard("student")->user()->is_profile_complete == 1 ? "Complete" : "In complete" }}</x-table.td>
                <x-table.td>

                  <button type="button" class="inline-flex items-center justify-center rounded-xl border-2 bg-white px-3 py-2 text-sm font-semibold text-gray-800 transition hover:text-green-500 dark:border-primary">
                    Exam Form
                  </button>
                </x-table.td>
              </x-table.tr>
            </x-table.tbody>
          </x-table.table>
        </div>
      </div>
    </div>
  </section> --}}

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
                  <div class="rounded-xl border-2 bg-green-100 p-4 dark:border-primary dark:bg-green-500 ">
                    <div class="text-lg font-bold leading-none text-gray-800">Action</div>
                    <div class="mt-4">
                      <button type="button" class="inline-flex items-center justify-center rounded-xl border-2 bg-white px-3 py-2 my-2 text-md font-semibold text-gray-800 transition hover:text-green-500 dark:border-primary">
                        Hall Tiket
                      </button>
                      <button type="button" class="inline-flex items-center justify-center rounded-xl border-2 bg-white px-3 py-2 my-2 text-md font-semibold text-gray-800 transition hover:text-green-500 dark:border-primary">
                        Result
                      </button>

                      
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
              </div>
            </div>
            <div>
              <div class="space-y-4">
                <div class="space-y-2 rounded-xl border-2 bg-pink-100 px-3 py-2 text-gray-800 dark:border-primary dark:bg-pink-500">
                  <div class="flex justify-between">
                    <span class="font-bold">Personal Information</span>
                  </div>
                  <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                    <span class="font-bold">Student Name : {{ Auth::guard("student")->user()->student_name }} </span>
                  </div>
                  <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                    <span class="font-bold">Mother Name : {{ Auth::guard("student")->user()->mother_name ?? "N.A." }}</span>
                  </div>
                  <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                    <span class="font-bold">PRN : {{ Auth::guard("student")->user()->prn ?? "N.A." }} </span>
                  </div>
                </div>
                <div class="space-y-4">
                  <div class="space-y-2 rounded-xl border-2 bg-red-100 px-3 py-2 text-gray-800 dark:border-primary dark:bg-red-400">
                    <div class="flex justify-between">
                      <span class="font-bold">Course Enrollment</span>
                    </div>
                    <div class="space-y-2 rounded-xl border-2 bg-white px-3 py-2 text-gray-800 dark:border-primary">
                      <span class="font-bold"> {{ Auth::guard("student")->user()->patternclass->getclass->course->course_name }}</span>
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
                    {{-- @if($student->patternclass->coursepatternclasses->course->course_type=='UG')
                    {{(8-$student->getNONCGPAtotal())>0?(8-$student->getNONCGPAtotal()):"0"}}
                    @endif
                    @if($student->patternclass->coursepatternclasses->course->course_type=='PG')
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
