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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles


</head>


<body class="antialiased ">


    <div class="  overflow-hidden  relative " x-data="{ open: true }">

       <div class="flex min-h-screen">
        <aside   x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        
        
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

                <a class=" mx-1   flex flex-inline px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="studhome">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg> Dashboard
                </a>



                <a class=" mx-1 flex flex-inline px-4 py-2 mt-2 text-sm font-semibold text-gray-200 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="student-login">
                    <span><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg></span>
                    Log In
                </a>

                <a class=" mx-1 flex flex-inline px-4 py-2 mt-2 text-sm font-semibold text-gray-200 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="student-register">
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





            </nav>



        </aside>
        <div class="    bg-gray-200 flex-1 ">
            <div>
                <nav class="flex  justify-between bg-gray-700 p-2 mb-1 mr-1 rounded shadow border border-b-2 ">
                    <div class="flex items-center  text-white mr-6">
                        <button @click="open = !open" class="hidden md:block m-2 hover:bg-gray-500 px-2  rounded-sm ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                            </svg>

                        </button>

                        <svg class=" py-1 h-8 w-8 mr-1 " width="54" height="54" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>

                        <span class="font-semibold text-xl tracking-tight text-gray-200">STUDENT</span>
                    </div>

                    <div class=" flex space-x-3 text-black font-semibold mr-5 ">
                        <div
                            class=" rounded bg-yellow-400 hover:bg-yellow-300 opacity-80 py-1 px-2 block  hover:text-white">
                            <a href="student-login"> Login</a>

                        </div>
                        <div class="rounded bg-yellow-400 hover:bg-yellow-300 py-1 px-2 block hover:text-white  ">
                            <a href="student-register"> Register</a>
                        </div>



                    </div>





                </nav>
            </div>

            <div class=" bg-gray-200  ">

                <div class=" border border-t-4 border-pink-400 shadow m-1 rounded  bg-white">

                    <div class="grid grid-cols-1  md:grid-cols-1 lg:grid-cols-2 ">

                        <div>
                            <div class=" py-2 px-2 border border-gray-300  space-y-2 m-2 ">


                                <div class="  border-b-2 border-gray-300">
                                    <p class=" font-bold text-xl"> Email Id and Mobile Number Update
                                    <p>
                                </div>
                                <div class="    px-1">

                                    <p>
                                        If your subject is not in the exam form, please update your subject from
                                        admission section

                                    </p>
                                    <p>
                                        जर तुमचा विषय परीक्षा फॉर्ममध्ये नसेल तर कृपया तुमचा विषय प्रवेश विभागातून अपडेट
                                        करा
                                    </p>
                                    <p>
                                        You can also update email id and mobile number from Exam Department.

                                    </p>
                                    <p>
                                        तुम्ही परीक्षा विभागाकडून ईमेल आयडी आणि मोबाईल नंबर देखील अपडेट करू शकता.
                                    </p>

                                </div>
                            </div>


                            <div class=" py-2 px-2 border border-gray-300  m-2">
                                <div class="  border-b-2 border-gray-300">
                                    <p class=" font-bold text-xl"> Student Profile
                                    <p>
                                </div>
                                <ol class=" ml-6   list-disc m    px-1 text-justify space-y-1">

                                    <li>
                                        Every student who wants to apply for the online exam form is required to
                                        register on the Student
                                        Profile .
                                        <p class="  tracking-tighter">ऑनलाइन परीक्षा फॉर्मसाठी अर्ज करू इच्छिणाऱ्या
                                            प्रत्येक विद्यार्थ्याने विद्यार्थी प्रोफाइलवर नोंदणी करणे आवश्यक आहे.</p>
                                    </li>
                                    <li>
                                        Once a registered student is able to use a single account. the student can use
                                        this account from
                                        the first year to graduation
                                        <p>
                                            एकदा नोंदणीकृत विद्यार्थी एकच खाते वापरण्यास सक्षम आहे. विद्यार्थी पहिल्या
                                            वर्षापासून पदवीपर्यंत हे खाते वापरू शकतो.
                                        </p>
                                    </li>
                                    <li>
                                        No duplicate accounts is allowed on same Email ID and Mobile Number.
                                        <p>Account बनवताना ईमेल आयडी आणि मोबाइल नंबर डुप्लिकेट नसावेत.</p>
                                    </li>
                                    <li>
                                        Only one account per student is allowed.
                                        <p>एका विद्यार्थ्याचे केवळ एकच Account असावे.</p>
                                    </li>
                                    <p class=" font-semibold flex  border-b-2 border-green-200 ">
                                        Steps To Create Profile / प्रोफाइल तयार करण्याचे टप्पे</p>
                                    <p>

                                    <ol class=" list-outside  list-decimal ml-6 text-justify">
                                        <li> Create Account / Account तयार करा</li>
                                        <li>Login / Login करा</li>
                                        <li>Enroll for the Course / कोर्ससाठी नोंदणी करा</li>
                                        <li>Fill Personal Information / वैयक्तिक माहिती भरा </li>





                                    </ol>
                                    </p>
                                    <p>

                                    </p>

                                </ol>
                            </div>

                        </div>
                        <div>

                            <div class=" py-2 px-2 border border-gray-300  space-y-2 m-2 ">


                                <div class="  border-b-2 border-gray-300">
                                    <p class=" font-bold text-xl"> Online Exam Form Dates
                                    <p>
                                </div>
                                <div class="   py-2 px-1">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio animi vero ex possimus saepe aspernatur dolores, ducimus natus quam unde excepturi doloribus perspiciatis nostrum minus ipsum qui a ipsam dicta.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam similique deserunt pariatur explicabo consectetur iusto dolor exercitationem quidem corrupti voluptate ipsa perferendis nostrum assumenda maxime, iste, porro maiores odit distinctio?
                                    @if ($activeexamDate)

                                        <table
                                            class=" table-fixed rounded  text-sm whitespace-no-wrapw-full whitespace-no-wrap">
                                            <thead>
                                                <tr class="text-center font-bold bg-gray-400 ">
                                                    <td class="w-2/6 border border-gray-500 p-1">Course</td>
                                                    <!-- <td class="border border-gray-500 p-1">Result Date</td> -->
                                                    <td class="border w-1/6 border-gray-500 p-1">Start Date</td>
                                                    <td class="border w-1/6 border-gray-500 p-1">Without Late Fee End
                                                        Date</td>
                                                    <td class="border w-1/6 border-gray-500 p-1">With Late Fee End Date
                                                    </td>
                                                    <td class="border w-1/6 border-gray-500 p-1">Fine Fee End Date</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($activeexamDate->sortByDESC('start_date') as $data)
                                                    <tr class="  hover:bg-blue-100 odd:bg-green-200">
                                                        <td class="border border-gray-500  text-sm ">
                                                            {{ $data->patternclass->getclass->class_name }}{{ $data->patternclass->pattern->pattern_name }}
                                                        </td>
                                                        <!-- <td class="border border-gray-500 p-1">{{ $data->result_date == null ? '' : date('d-M-Y', strtotime($data->result_date)) }}</td> -->
                                                        <td class="primary border border-gray-500 ">
                                                            {{ $data->start_date == null ? '' : date('d-M-Y', strtotime($data->start_date)) }}
                                                        </td>
                                                        <td class="border border-gray-500 ">
                                                            {{ $data->end_date == null ? '' : date('d-M-Y', strtotime($data->end_date)) }}
                                                        </td>
                                                        <td class="border border-gray-500 ">
                                                            {{ $data->latefee_date == null ? '' : date('d-M-Y', strtotime($data->latefee_date)) }}
                                                        </td>
                                                        <td class="border border-gray-500 ">
                                                            {{ $data->finefee_date == null ? '' : date('d-M-Y', strtotime($data->finefee_date)) }}
                                                        </td>
                                                    </tr>
                                                @endforeach



                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="mt-6">
                                                            {{ $activeexamDate->links() }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>



                                        </table>

                                    @endif

                                </div>
                            </div>


                        </div>

                    </div>








                    <div class=" py-1 px-2 border border-gray-300  text-justify mb-8"> After completing above steps your
                        profile will be complete and you can fill exam form
                        by
                        clicking Exam Form button from dashboard.
                        <p>
                            वरील टप्पे पूर्ण केल्यानंतर आपले प्रोफाइल पूर्ण होईल आणि आपण डॅशबोर्डवरील Exam Form बटनावर
                            क्लिक करून परीक्षा फॉर्म भरू शकता.
                        </p>
                    </div>
                </div>
            </div>




            <footer class=" h-12 fixed  bottom-0 items-center text-center w-full  bg-gray-700 text-white">
                <p class=" font-bold  ">Copyright © 2021 Sangamner College. </p>
            </footer>

        </div>
       </div>

    </div>






    

    @livewireScripts
</body>

</html>
