@extends("layouts.guest")
@section("guest")


    <section>
        {{-- Header --}}
        <section>
          <div class="grid grid-cols-1 gap-2 p-3 lg:grid-cols-3 flex justify-between">
              <div class="flex-1 order-1 text-center text-2xl font-semibold">
                  संगमनेर नगरपालिका कला डी.जे. मालपाणी वाणिज्य आणि बी.एन.सारडा विज्ञान महाविद्यालय (स्वायत्त), संगमनेर.
              </div>
              <div class="flex-1 order-first md:order-2">
                  <img class="w-26  m-auto h-24 animate-pulse rounded " src="{{ asset("img/shikshan-logo.png") }}"/>
              </div>
                <div class="flex-1 order-last text-center text-2xl font-semibold">
                  Sangamner Nagarpalika Arts D. J. Malpani Commerce and B. N. Sarda Science College (Autonomous), Sangamner.
                </div>
          </div>
        </section>
        {{-- Navbar --}}
        <section>

            <div x-data="{ open: false }" class="sticky top-0 z-30 mx-auto flex max-w-full flex-col rounded-b-lg rounded-t-sm bg-gray-700 px-4 py-4 text-white shadow-lg md:flex-row md:items-center md:justify-between md:py-3 lg:py-2">
        
                <button class="focus:shadow-outline absolute right-0 top-0 mr-5 rounded-lg focus:outline-none md:hidden" @click="open = !open">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
                </button>
                <nav :class="{ 'flex': open, 'hidden': !open }" class="hidden flex-grow flex-col pb-4 md:flex md:flex-row md:justify-end md:pb-0">
          
                  <a class=":active dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg px-4 py-2 text-lg font-semibold text-white hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none active:bg-gray-200 md:mt-0" href="#">Dashboard </a>
          
                  <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-transparent px-4 py-2 text-left text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:ml-4 md:mt-0 md:inline md:w-auto">
                      <span>Students</span>
                      <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }" class="ml-1 mt-1 inline h-4 w-4 transform transition-transform duration-200 md:-mt-1">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="relative right-0 mt-2 w-full origin-top-right rounded-md shadow-lg md:absolute md:w-48">
                      <div class="dark-mode:bg-gray-800 rounded-md bg-gray-700 px-1 py-2 shadow">
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="{{ route("student.login") }}">Student Login</a>
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="/student/">Schedules &amp;
                          Timetables</a>
          
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="#">Ordinance of
                          Exams</a>
          
                        <!-- <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                                      href="#">Manual
                                      Exam Forms</a> -->
          
                      </div>
                    </div>
                  </div>
          
                  <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-transparent px-4 py-2 text-left text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:ml-4 md:mt-0 md:inline md:w-auto">
                      <span>Department</span>
                      <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }" class="ml-1 mt-1 inline h-4 w-4 transform transition-transform duration-200 md:-mt-1">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="relative right-0 mt-2 w-full origin-top-right rounded-md shadow-lg md:absolute md:w-48">
                      <div class="dark-mode:bg-gray-800 rounded-md bg-gray-700 px-1 py-2 shadow">
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="{{ route("faculty.login") }}">Department Login</a>
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="#"> Circulars</a>
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="#"> Department wise Summaries</a>
                      </div>
                    </div>
                  </div>
          
                  <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-transparent px-4 py-2 text-left text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:ml-4 md:mt-0 md:inline md:w-auto">
                      <span>Examination Section</span>
                      <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }" class="ml-1 mt-1 inline h-4 w-4 transform transition-transform duration-200 md:-mt-1">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="relative right-0 mt-2 w-full origin-top-right rounded-md shadow-lg md:absolute md:w-48">
                      <div class="dark-mode:bg-gray-800 rounded-md bg-gray-700 px-1 py-2 shadow">
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="{{ route("user.login") }}"> User Log in</a>
          
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="#"> Board of Examination</a>
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-lg font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0" href="#"> Exam Reform Committee</a>
                      </div>
                    </div>
                  </div>
          
                  <div class="space-x-8 bg-gray-700 text-white sm:-my-px sm:ml-10 sm:flex">
                    @if (Route::has("user.login"))
                      <div class="right-0 px-6 py-2 sm:block">
                        @auth
                          <a href="{{ route("user.dashboard") }}" class="text-white-700 text-lg underline">User Dashboard</a>
                        @else
                          <a href="{{ route("user.login") }}" class="text-white-700 text-lg underline">Log in</a>
          
                        @endauth
                      </div>
                    @endif
          
                  </div>
          
                </nav>
          
              </div>
          </section>

    
    
        </section>


 

  {{-- <section>
    <div class="grid grid-cols-1 gap-2 p-3 lg:grid-cols-3">
      <!-- Principal card -->
      <div class="flex items-center justify-between rounded-md dark:bg-darker">
        <div class="min-h-full w-full rounded-lg bg-white px-6 py-5 shadow-xl ring-1 ring-slate-900/5 dark:bg-slate-900">
          <div class="flex justify-center">
            <span>
              <img class="h-20 w-20 rounded-full object-cover" src="{{ asset("img/principal-photo.jpg") }}" alt="Photo">
            </span>
          </div>
          <h2 class="mt-5 text-base font-medium tracking-tight text-slate-900 dark:text-white">
            Prof. (Dr.) Arun Gaikwad Principal
            <hr>
          </h2>
          <p class="my-2 indent-8 text-sm text-slate-500 dark:text-slate-400">
            I am very happy to present the profile of our college. Established with the aim to spread knowledge unto the last, we have tried to be the lighthouse for the rural youth. The college started with the generous donations of those after whom the three faculties have been named and those to whom we are indebted for the huge campus, and also with the donations of coolies and workers. We have never lost sight of the grass root level, but we have always aspired for wider horizons. College has developed infrastructure necessary for an overall development of the students – classrooms, laboratories, library, gymnasium, a big playground, auditorium, audio-visual aids etc. At the same time, we have been educating first generation learners and we have also been equipping our students with the caliber required for a global competition. With the vision of ex-Principal M.V. Kaundinya and the ex-Chairman late Shri Omkarnathji Malpnai, the college has striven for academic excellence and also established firm linkages with the society around. In our rural development projects, N.S.S. activities, Learn to Earn scheme etc. we express our social commitment. We look forward to higher levels of achievement for the students and for the college. We are sure that we can keep pace with the changing times.
          </p>
        </div>
      </div>

      <!-- Sub Principal  card -->
      <div class="flex items-center justify-between rounded-md dark:bg-darker">
        <div class="min-h-full w-full rounded-lg bg-white px-6 py-5 shadow-xl ring-1 ring-slate-900/5 dark:bg-slate-900">
          <div class="flex justify-center">
            <span>
              <img class="w-25 h-20 rounded-full object-cover" src="{{ asset("img/r-s-laddha.jpg") }}" alt="Photo">
            </span>
          </div>
          <h2 class="mt-5 text-base font-medium tracking-tight text-slate-900 dark:text-white">
            Dr.Rajendra Laddha Controller of Examination
            <hr>
          </h2>
          <p class="my-2 indent-8 text-sm text-slate-500 dark:text-slate-400">
            I am very happy to present the profile of our college. Established with the aim to spread knowledge unto the last, we have tried to be the lighthouse for the rural youth. The college started with the generous donations of those after whom the three faculties have been named and those to whom we are indebted for the huge campus, and also with the donations of coolies and workers. We have never lost sight of the grass root level, but we have always aspired for wider horizons. College has developed infrastructure necessary for an overall development of the students – classrooms, laboratories, library, gymnasium, a big playground, auditorium, audio-visual aids etc. At the same time, we have been educating first generation learners and we have also been equipping our students with the caliber required for a global competition. With the vision of ex-Principal M.V. Kaundinya and the ex-Chairman late Shri Omkarnathji Malpnai, the college has striven for academic excellence and also established firm linkages with the society around. In our rural development projects, N.S.S. activities, Learn to Earn scheme etc. we express our social commitment. We look forward to higher levels of achievement for the students and for the college. We are sure that we can keep pace with the changing times.
          </p>
        </div>
      </div>

      <!-- Recent Updates card -->
      <div class="flex items-center justify-between rounded-md dark:bg-darker">
        <div class="min-h-full w-full rounded-lg bg-white px-6 py-5 shadow-xl ring-1 ring-slate-900/5 dark:bg-slate-900">
          <h2 class="mt-5 text-base font-medium tracking-tight text-slate-900 dark:text-white">
            Recent Updates
            <hr>
          </h2>
          <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
            somethis ...
          </p>
        </div>
      </div>
    </div>
  </section> --}}



  <section>
    <!-- This example requires Tailwind CSS v2.0+
-->
<footer class="bg-white" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="px-5 py-12 mx-auto max-w-7xl lg:py-16 md:px-12 lg:px-20">
      <div class="xl:grid xl:grid-cols-3 xl:gap-8">
        <div class="space-y-8 xl:col-span-1">
          <a class="text-lg font-bold tracking-tighter text-blue-600 transition duration-500 ease-in-out transform tracking-relaxed lg:pr-8" href="/groups/footer/"> wickedblocks </a>
          <p class="w-1/2 mt-2 text-sm text-gray-500">Wicked templates for wicked dev's</p>
        </div>
        <div class="grid grid-cols-2 gap-8 mt-12 xl:mt-0 xl:col-span-2">
          <div class="md:grid md:grid-cols-2 md:gap-8">
            <div>
              <h3 class="text-xs font-semibold tracking-wider text-blue-600 uppercase">Solutions</h3>
              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-sm font-normal text-gray-500 hover:text-gray-900"> Marketing </a>
                </li>
  
                <li>
                  <a href="#" class="text-sm font-normal text-gray-500 hover:text-gray-900"> Analytics </a>
                </li>
  
                <li>
                  <a href="#" class="text-sm font-normal text-gray-500 hover:text-gray-900"> Commerce </a>
                </li>
  
                <li>
                  <a href="#" class="text-sm font-normal text-gray-500 hover:text-gray-900"> Insights </a>
                </li>
              </ul>
            </div>
            <div class="mt-12 md:mt-0">
              <h3 class="text-xs font-semibold tracking-wider text-blue-600 uppercase">Support</h3>
              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-sm font-normal text-gray-500 hover:text-gray-900"> Pricing </a>
                </li>
  
                <li>
                  <a href="#" class="text-sm font-normal text-gray-500 hover:text-gray-900"> Documentation </a>
                </li>
  
                <li>
                  <a href="#" class="text-sm font-normal text-gray-500 hover:text-gray-900"> Guides </a>
                </li>
  
                <li>
                  <a href="#" class="text-sm font-normal text-gray-500 hover:text-gray-900"> API Status </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="hidden lg:justify-end md:grid md:grid-cols-1">
            <div class="w-full mt-12 md:mt-0">
              <div class="mt-8 lg:justify-end xl:mt-0">
                <h3 class="text-xs font-semibold tracking-wider text-blue-600 uppercase">Subscribe to our newsletter</h3>
                <p class="mt-4 text-sm text-gray-500 lg:ml-auto">The latest news, articles, and resources, sent to your inbox weekly.</p>
                <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                  <form action="" method="post" id="revue-form" name="revue-form" target="_blank" class="p-1 mt-4 transition duration-500 ease-in-out transform border2 bg-gray-50 rounded-xl sm:max-w-lg sm:flex">
                    <div class="flex-1 min-w-0 revue-form-group">
                      <label for="member_email" class="sr-only">Email address</label>
                      <input id="cta-email" type="email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform bg-transparent border border-transparent rounded-md focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" placeholder="Enter your email  ">
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-3 revue-form-actions">
                      <button type="submit" value="Subscribe" name="member[subscribe]" id="member_submit" class="block w-full px-5 py-3 text-base font-medium text-white bg-blue-600 border border-transparent rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300 sm:px-10">Notify me</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="px-5 py-12 mx-auto bg-gray-50 max-w-7xl sm:px-6 md:flex md:items-center md:justify-between lg:px-20">
      <div class="flex justify-center mb-8 space-x-6 md:order-last md:mb-0">
        <a href="#" class="text-gray-400 hover:text-gray-500">
          <span class="sr-only">Facebook</span>
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
          </svg>
        </a>
  
        <a href="#" class="text-gray-400 hover:text-gray-500">
          <span class="sr-only">Instagram</span>
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
          </svg>
        </a>
  
        <a href="#" class="text-gray-400 hover:text-gray-500">
          <span class="sr-only">Twitter</span>
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
          </svg>
        </a>
  
        <a href="#" class="text-gray-400 hover:text-gray-500">
          <span class="sr-only">GitHub</span>
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
          </svg>
        </a>
  
        <a href="#" class="text-gray-400 hover:text-gray-500">
          <span class="sr-only">Dribbble</span>
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
  
      <div class="mt-8 md:mt-0 md:order-1">
        <span class="mt-2 text-sm font-light text-gray-500">
          Copyright © 2020 - 2021
          <a href="https://wickedlabs.dev" class="mx-2 text-wickedblue hover:text-gray-500" rel="noopener noreferrer">@wickedlabsHQ</a>. Since 2020
        </span>
      </div>
    </div>
  </footer>
  
  </section>

  <div class="dark-mode:text-gray-200 dark-mode:bg-gray-800 w-full rounded-b-lg bg-white text-gray-900 shadow-lg">

    <div class="mx-2 mb-4 flex flex-col items-center pt-4 lg:flex-row">

      <div class="flex-1">
        <img class="w-26 m-auto h-24 animate-pulse rounded bg-white" src="{{ asset("img/shikshan-logo.png") }}"></img>

      </div>
      <div class="flex-1 text-center text-2xl font-semibold">
        Sangamner Nagarpalika Arts D. J. Malpani Commerce and B. N. Sarda Science College (Autonomous),
        Sangamner.

      </div>
    </div>

   
    <div class="bg-gray-200 px-2 pt-1">

      <div class="text-black-200 rounded-b-lg border border-gray-700 bg-white shadow-lg">
        <div class="grid grid-cols-1 justify-items-center border border-blue-500 bg-gray-300 lg:grid-cols-3 lg:gap-1">
          <div class="border border-blue-500 bg-white">

            <img class="m-auto h-32 w-32 rounded-full" src="{{ asset("img/principal-photo.jpg") }}"></img>

            <div class="h-52 px-6 py-1">
              <div class="text-xl font-bold">Prof. (Dr.) Arun Gaikwad
                Principal</div>
              <p class="h-36 overflow-auto text-justify text-gray-600">
                I am very happy to present the profile of our college. Established with the aim to spread knowledge
                unto the last, we have tried to be the lighthouse for the rural youth. The college started with the
                generous donations of those after whom the three faculties have been named and those to whom we are
                indebted for the huge campus, and also with the donations of coolies and workers. We have never lost
                sight of the grass root level, but we have always aspired for wider horizons.

                College has developed infrastructure necessary for an overall development of the students –
                classrooms, laboratories, library, gymnasium, a big playground, auditorium, audio-visual aids etc.
                At the same time, we have been educating first generation learners and we have also been equipping
                our students with the caliber required for a global competition.

                With the vision of ex-Principal M.V. Kaundinya and the ex-Chairman late Shri Omkarnathji Malpnai,
                the college has striven for academic excellence and also established firm linkages with the society
                around. In our rural development projects, N.S.S. activities, Learn to Earn scheme etc. we express
                our social commitment.

                We look forward to higher levels of achievement for the students and for the college. We are sure
                that we can keep pace with the changing times. </p>

            </div>

          </div>

          <div class="border border-blue-500 bg-white">
            <div class="m-auto max-w-sm rounded">
              <img class="mx-auto h-32 w-32 rounded-full" src="{{ asset("img/r-s-laddha.jpg") }}"></img>

            </div>
            <div class="px-6 py-4">
              <div class="text-xl font-bold">Dr.Rajendra Laddha Controller of Examination

              </div>
              <p class="h-36 overflow-auto text-justify text-gray-600">
                I am very happy to present the profile of our college. Established with the aim to spread knowledge
                unto the last, we have tried to be the lighthouse for the rural youth. The college started with the
                generous donations of those after whom the three faculties have been named and those to whom we are
                indebted for the huge campus, and also with the donations of coolies and workers. We have never lost
                sight of the grass root level, but we have always aspired for wider horizons.

                College has developed infrastructure necessary for an overall development of the students –
                classrooms, laboratories, library, gymnasium, a big playground, auditorium, audio-visual aids etc.
                At the same time, we have been educating first generation learners and we have also been equipping
                our students with the caliber required for a global competition.

                With the vision of ex-Principal M.V. Kaundinya and the ex-Chairman late Shri Omkarnathji Malpnai,
                the college has striven for academic excellence and also established firm linkages with the society
                around. In our rural development projects, N.S.S. activities, Learn to Earn scheme etc. we express
                our social commitment.

                We look forward to higher levels of achievement for the students and for the college. We are sure
                that we can keep pace with the changing times.
              </p>

            </div>

          </div>
          <div class="order-first w-full border border-blue-500 bg-white lg:order-last">

            <div class="w-full py-10 text-center text-3xl font-bold"> Recent Updates</div>

            <marquee class="h-64" behavior="scroll" scrollamount="1" direction="up" onMouseOver="this.stop()" onMouseOut="this.start()">
              @if (!is_null($post))
                @foreach ($post as $data)
                  <p class="my-2 rounded bg-gray-100 text-justify text-gray-600">

                  <div class="inline-flex animate-bounce rounded bg-yellow-200 px-1 text-sm">
                    <small>{{ "New" }} </small>
                  </div> {{ $data->description }} </p>
                @endforeach
              @endif

            </marquee postio>

          </div>

        </div>

        <div class="text-black-200 m-1 bg-white shadow-lg">
          <!-- component -->
          <footer class="footer relative mx-1 border-b-2 border-blue-700 bg-white pt-1">
            <div class="container mx-auto px-6">

              <div class="sm:mt-8 sm:flex">
                <div class="mt-1 flex flex-col justify-between sm:mt-0 sm:w-full sm:px-8 md:flex-row">
                  <div class="flex flex-col">
                    <span class="mb-1 font-bold uppercase text-gray-700">Students Section</span>
                    <span class="my-1"><a href="#" class="text-md text-blue-700 hover:text-blue-500">Schedules &amp;
                        Timetables</a></span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">Exam
                        Forms
                        Online</a></span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">Results</a></span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">
                        Unfair means</a></span>

                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">
                        Certificate Section</a></span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">
                        Degree Certificate</a></span>

                  </div>
                  <div class="flex flex-col">
                    <span class="mb-2 mt-4 font-bold uppercase text-gray-700 md:mt-0">Department Section</span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">Department Login</a></span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">Circulars</a></span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">CEO
                        list</a></span>
                  </div>
                  <div class="flex flex-col">
                    <span class="mb-2 mt-4 font-bold uppercase text-gray-700 md:mt-0">Examination Section</span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">Office Model</a></span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">Board of Examination</a></span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500">Contact us</a></span>
                    <span class=""><a href="#" class="text-md text-blue-700 hover:text-blue-500"></a></span>

                  </div>
                </div>
              </div>
            </div>
            <div class="container mx-auto px-6">
              <div class="mt-2 flex flex-col items-center border-t-2 border-gray-300">
                <div class="py-2 text-center sm:w-2/3">
                  <p class="mb-1 text-sm font-bold text-blue-700">
                    Copyright © 2023 NEP-2020 Sangamner College Sangamner (Autonomous) All rights reserved. </p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>

    </div>
  </div>
@endsection
