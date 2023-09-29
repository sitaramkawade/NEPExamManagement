<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exam Online - Examination Section Sangamner College, Sangamner (Autonomous) </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

 

    
    <style>
        body {
            font-family: 'Nunito', sans-serif;

        }
    </style>
</head>

<body class="antialiased bg-gray-200">

    <div class="w-full   shadow-lg rounded-b-lg  text-gray-900 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800  ">

        <div class="pt-4 mx-2 mb-4 items-center  flex  flex-col lg:flex-row  ">
            <div class=" flex-1 text-2xl font-semibold    text-center     ">
                संगमनेर नगरपालिका कला डी.जे. मालपाणी वाणिज्य आणि बी.एन.सारडा विज्ञान महाविद्यालय (स्वायत्त), संगमनेर.

            </div>
            <div class=" flex-1">
                <img class=" m-auto w-26 h-24 animate-pulse   bg-white rounded" src="{{ asset('img/shikshan-logo.png') }}"></img>

            </div>
            <div class="  flex-1 text-2xl font-semibold    text-center   ">
                Sangamner Nagarpalika Arts D. J. Malpani Commerce and B. N. Sarda Science College (Autonomous),
                Sangamner.

            </div>
        </div>

        <div x-data="{ open: false }"
            class=" flex flex-col max-w-full sticky top-0 z-30 rounded-b-lg rounded-t-sm
             shadow-lg py-4 lg:py-2 md:py-3 px-4 bg-gray-700 text-white   mx-auto 
             md:items-center md:justify-between md:flex-row  ">

            <button class=" absolute right-0 top-0 mr-5 md:hidden  rounded-lg focus:outline-none focus:shadow-outline"
                @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row ">

                <a class="px-4 py-2 mt-2 text-lg font-semibold text-white :active   rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline active:bg-gray-200"
                    href="#">Home </a>

                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-lg font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>Students</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="relative md:absolute  right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                        <div class=" px-1 py-2 bg-gray-700 rounded-md shadow dark-mode:bg-gray-800 ">
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="/student/">Exam Form Online</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="/student/">Schedules &amp;
                                Timetables</a>

                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Ordinance of
                                Exams</a>

                            <!-- <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">Manual
                            Exam Forms</a> -->


                        </div>
                    </div>
                </div>

                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-lg font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>Department</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="relative md:absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="px-1 py-2 bg-gray-700 rounded-md shadow dark-mode:bg-gray-800">
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Department Login</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#"> Circulars</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#"> Department wise Summaries</a>
                        </div>
                    </div>
                </div>

                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-lg font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>Examination Section</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="relative  md:absolute  right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="px-1 py-2 bg-gray-700 rounded-md shadow dark-mode:bg-gray-800">
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="{{ route('login') }}"> Log in</a>

                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#"> Board of Examination</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#"> Exam Reform Committee</a>
                        </div>
                    </div>
                </div>


   

                <div class=" bg-gray-700 space-x-8 text-white sm:-my-px sm:ml-10 sm:flex">
                    @if (Route::has('login'))
                        <div class="  right-0 px-6 py-2 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-lg text-white-700 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class=" text-lg text-white-700 underline">Log in</a>


                            @endauth
                        </div>
                    @endif


                </div>


            </nav>

        </div>
       <div class=" bg-gray-200 px-2 pt-1   ">

       
    
        <div class=" bg-white text-black-200 shadow-lg      rounded-b-lg border border-gray-700">
            <div class="  border border-blue-500 grid grid-cols-1        lg:grid-cols-3 bg-gray-300 lg:gap-1 justify-items-center  ">
                <div class="  bg-white border border-blue-500   ">
                   
                        <img class=" m-auto w-32 h-32 rounded-full   " src="{{ asset('img/principal-photo.jpg') }}"></img>
        
                    
                    <div class=" px-6 py-1  h-52">
                        <div class=" font-bold text-xl ">Prof. (Dr.) Arun Gaikwad
                            Principal</div>
                        <p class=" text-gray-600   text-justify       overflow-auto h-36">
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
                
                
                <div class="     bg-white  border border-blue-500 ">
                    <div class="rounded    max-w-sm  m-auto ">
                        <img class="  mx-auto w-32 h-32 rounded-full 	 " src="{{ asset('img/r-s-laddha.jpg') }}"></img>
        
                    </div>
                    <div class=" px-6 py-4">
                        <div class=" font-bold text-xl">Dr.Rajendra Laddha Controller of Examination
        
                        </div>
                        <p  class=" text-gray-600   text-justify       overflow-auto h-36 ">
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
                <div class=" w-full border border-blue-500    bg-white order-first lg:order-last">
        
                     
                        <div class=" font-bold text-3xl py-10 text-center w-full "> Recent Updates</div>
        
        
                        <marquee class="h-64" behavior="scroll" scrollamount="1" direction="up" onMouseOver="this.stop()"
                            onMouseOut="this.start()">
                              @if (!is_null($post))
                                @foreach ($post as $data)
                                    <p class=" bg-gray-100 rounded my-2  text-gray-600 text-justify">
        
                                    <div class=" animate-bounce  bg-yellow-200 inline-flex rounded text-sm px-1">
                                        <small>{{ 'New' }} </small></div> {{ $data->description }} </p>
                                @endforeach
                            @endif
        
        
                        </marquee postio>
        
                     
        
                </div>
        
            </div>
        
        
        
            <div class=" bg-white text-black-200 shadow-lg  m-1    ">
            <!-- component -->
            <footer class="footer bg-white relative pt-1 border-b-2 border-blue-700 mx-1">
                <div class="container mx-auto px-6">
        
                    <div class="sm:flex sm:mt-8">
                        <div class="mt-1 sm:mt-0 sm:w-full sm:px-8 flex flex-col md:flex-row justify-between">
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-700 uppercase mb-1">Students Section</span>
                                <span class="my-1"><a href="#"
                                        class="text-blue-700  text-md hover:text-blue-500">Schedules &amp;
                                        Timetables</a></span>
                                <span class=" "><a href="#"
                                        class="text-blue-700  text-md hover:text-blue-500">Exam
                                        Forms
                                        Online</a></span>
                                <span class=" "><a href="#"
                                        class="text-blue-700  text-md hover:text-blue-500">Results</a></span>
                                <span class=" "><a href="#" class="text-blue-700  text-md hover:text-blue-500">
                                        Unfair means</a></span>
        
                                <span class=" "><a href="#" class="text-blue-700  text-md hover:text-blue-500">
                                        Certificate Section</a></span>
                                <span class=" "><a href="#" class="text-blue-700  text-md hover:text-blue-500">
                                        Degree Certificate</a></span>
        
        
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-700 uppercase mt-4 md:mt-0 mb-2">Department Section</span>
                                <span class=" "><a href="#"
                                        class="text-blue-700 text-md hover:text-blue-500">Department Login</a></span>
                                <span class=" "><a href="#"
                                        class="text-blue-700  text-md hover:text-blue-500">Circulars</a></span>
                                <span class=" "><a href="#" class="text-blue-700  text-md hover:text-blue-500">CEO
                                        list</a></span>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-700 uppercase mt-4 md:mt-0 mb-2">Examination Section</span>
                                <span class=" "><a href="#"
                                        class="text-blue-700  text-md hover:text-blue-500">Office Model</a></span>
                                <span class=" "><a href="#"
                                        class="text-blue-700  text-md hover:text-blue-500">Board of Examination</a></span>
                                <span class=" "><a href="#"
                                        class="text-blue-700  text-md hover:text-blue-500">Contact us</a></span>
                                <span class=" "><a href="#"
                                        class="text-blue-700  text-md hover:text-blue-500"></a></span>
        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto px-6 ">
                    <div class="mt-2 border-t-2 border-gray-300 flex flex-col items-center">
                        <div class="sm:w-2/3 text-center py-2">
                            <p class="text-sm text-blue-700 font-bold mb-1">
                                Copyright © 2023 NEP-2020 Sangamner College Sangamner (Autonomous) All rights reserved. </p>
                        </div>
                    </div>
                </div>
            </footer>
            </div>
        </div>
        
       </div>
    </div>
    @livewireScripts
</body>

</html>
