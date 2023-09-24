<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{!! asset('img/shikshan-logo.png') !!}" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->

   
  
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="antialiased  ">


    <div class="  overflow-hidden  relative " x-data="{ open: true }">

        <div class="flex min-h-screen">
            <aside x-show="open" x-transition:enter="transition-transform transition-opacity ease-in duration-100"
                x-transition:enter-start="opacity-100 transform translate-x-0"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-end="opacity-100 transform -translate-x-0"
                class=" w-72   bg-gray-700 hidden    md:block         ">




                <div class=" flex   ">

                    <img class="p-2 h-20 m-auto mt-2 rounded shadow-2xl bg-white opacity-80 hover:bg-gray-200 hover:optacity-100 "
                        src="{{ asset('img/shikshan-logo.png') }}"></img>
                </div>



                <div
                    class=" transition-all duration-500 rounded uppercase shadow-md mt-1 mx-1  py-2 text-xl bg-yellow-400 hover:bg-yellow-300 font-semibold tracking-tighter  hover:text-gray-600  text-center text-gray-900">
                    Sangamner College, Sangamner


                </div>


                <nav class="  pb-4 ">

                    {{-- <a class=" mx-1   flex flex-inline px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="studhome">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg> Dashboard
                    </a>



                    <a class=" mx-1 flex flex-inline px-4 py-2 mt-2 text-sm font-semibold text-gray-200 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('student.login') }}">
                        <span><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg></span>
                        Log In
                    </a>

                    <a class=" mx-1 flex flex-inline px-4 py-2 mt-2 text-sm font-semibold text-gray-200 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('student.register') }}">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd" />
                            </svg></span> Create Account</a>

                    <a class=" mx-1 flex flex-inline px-4 py-2 mt-2 text-sm  text-gray-100 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                        href="#">


                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 3l-6 6m0 0V4m0 5h5M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                        </svg> Contact</a>
                        --}}





                </nav>



            </aside>
            <div class="    bg-gray-200 flex-1 ">


                @include('layouts.studentnavigation')

                <!-- Content  -->
                <div class=" bg-gray-200  ">

                    @include('student.dashboard.studenthumberger')
              
                 
                    <!-- Page Heading -->


                    @if (isset($header))
                        <header class="bg-white shadow m-2">
                            <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                                {{ $header }}

                                
                            </div>
                        </header>
                      
                    @endif

                  
                    <!-- Page Content -->
                    <div
                        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-200 dark:bg-gray-900">

                      
                        <div class="w-full  px-1 py-1 dark:bg-gray-800  overflow-hidden sm:rounded-lg">

                            <main>

                                {{ $slot }}

                            </main>

                        </div>


                    </div>
                </div>

            </div>



        </div>


        <footer class="footer bg-gray-700     ">

            <div class="container mx-auto px-6 py-2">
               
                   
                        <p class="text-sm  text-center text-white font-semibold  ">
                            Copyright © 2023 NEP-2020 Sangamner College Sangamner (Autonomous) All rights reserved. </p>
                     
                 
            </div>
        </footer>
    </div>
        @stack('modals')

      
        @livewireScripts
</body>

</html>
