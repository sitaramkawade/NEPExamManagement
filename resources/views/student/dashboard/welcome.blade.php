<x-newstudent-layout>
<div class=" bg-gray-200  ">

    <div class=" border border-t-4 border-pink-400 shadow m-1 rounded  bg-white ">

        <div class="grid grid-cols-1  md:grid-cols-1 lg:grid-cols-2   ">

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








        <div class="  border border-gray-300    m-2 ">


            <div class="  border-b-2 border-gray-300  ">
             <p>    After completing above steps your
                profile will be complete and you can fill exam form
                by
                clicking Exam Form button from dashboard.</p>
            <p>
                वरील टप्पे पूर्ण केल्यानंतर आपले प्रोफाइल पूर्ण होईल आणि आपण डॅशबोर्डवरील Exam Form बटनावर
                क्लिक करून परीक्षा फॉर्म भरू शकता.
            </p>
        </div>
        </div>
        
    </div>
</div>






</div>
</div>

</div>


</x-newstudent-layout>



     