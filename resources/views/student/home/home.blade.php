@extends('layouts.student')
@section('student')
<div>
  <div class="py-2">
    <div class="flex flex-col gap-3 p-2 md:flex-row">
      <div class="w-full gap-3 md:w-2/4">
        <div class="mb-3">
          <!-- Card -->
          <div class="rounded-md bg-white dark:bg-darker">
            <!-- Card header -->
            <div class="flex items-center justify-between border-b p-4 dark:border-primary">
              <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Exam Form Subjetcs</h4>
            </div>
            <!-- Card body -->
            <div class="relative h-auto px-10 py-5">
              <div>
                <ul class="list-disc">
                  <li>
                    <p>If your subject is not in the exam form, please update your subject from admission section (Mr.Wale)</p>
                  </li>
                  <li>
                    <p>जर तुमचा विषय परीक्षा फॉर्ममध्ये नसेल तर कृपया तुमचा विषय प्रवेश विभागातून अपडेट करा (Mr.Wale)</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <!-- Card -->
          <div class="rounded-md bg-white dark:bg-darker">
            <!-- Card header -->
            <div class="flex items-center justify-between border-b p-4 dark:border-primary">
              <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Email Id And Mobile Number Update</h4>
            </div>
            <!-- Card body -->
            <div class="relative h-auto px-10 py-5">
              <div>
                <ul class="list-disc">
                  <li>
                    <p>You can also update email id and mobile number from Exam Department. </p>
                  </li>
                  <li>
                    <p> तुम्ही परीक्षा विभागाकडून ईमेल आयडी आणि मोबाईल नंबर देखील अपडेट करू शकता.</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <!-- Card -->
          <div class="rounded-md bg-white dark:bg-darker">
            <!-- Card header -->
            <div class="flex items-center justify-between border-b p-4 dark:border-primary">
              <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Student Profile</h4>
            </div>
            <!-- Card body -->
            <div class="relative h-auto px-10 py-5">
              <div>
                <ul class="list-disc">
                  <li>
                    <p>Every student who wants to apply for the online exam form is required to register on the Student Profile . </p>
                  </li>
                  <li>
                    <p>ऑनलाइन परीक्षा फॉर्मसाठी अर्ज करू इच्छिणाऱ्या प्रत्येक विद्यार्थ्याने विद्यार्थी प्रोफाइलवर नोंदणी करणे आवश्यक आहे.</p>
                  </li>
                  <li>
                    <p>Once a registered student is able to use a single account. the student can use this account from the first year to graduation</p>
                  </li>
                  <li>
                    <p>एकदा नोंदणीकृत विद्यार्थी एकच खाते वापरण्यास सक्षम आहे. विद्यार्थी पहिल्या वर्षापासून पदवीपर्यंत हे खाते वापरू शकतो.</p>
                  </li>
                  <li>
                    <p>No duplicate accounts is allowed on same Email ID and Mobile Number.</p>
                  </li>
                  <li>
                    <p>Account बनवताना ईमेल आयडी आणि मोबाइल नंबर डुप्लिकेट नसावेत.</p>
                  </li>
                  <li>
                    <p>Only one account per student is allowed.</p>
                  </li>
                  <li>
                    <p>एका विद्यार्थ्याचे केवळ एकच Account असावे.</p>
                  </li>
                </ul>
              </div>
              <!-- Card -->
              <div class="rounded-md bg-white dark:bg-darker">
                <!-- Card header -->
                <div class="flex items-center justify-between border-b dark:border-primary">
                  <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Steps To Create Profile / प्रोफाइल तयार करण्याचे टप्पे</h4>
                </div>
                <!-- Card body -->
                <div class="relative h-auto px-10 py-5">
                  <div>
                    <ol class="list-decimal">
                      <li>
                        <p>Create Account / Account तयार करा</p>
                      </li>
                      <li>
                        <p>Login / Login करा</p>
                      </li>
                      <li>
                        <p>Enroll for the Course / कोर्ससाठी नोंदणी करा</p>
                      </li>
                      <li>
                        <p>Fill Personal Information / वैयक्तिक माहिती भरा</p>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3 w-full gap-3 md:w-2/4">
        <!-- Card -->
        <div class="col-span-1 rounded-md bg-white dark:bg-darker">
          <!-- Card header -->
          <div class="flex items-center justify-between border-b p-4 dark:border-primary">
            <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Online Exam Form Dates</h4>
          </div>
          <!-- Card body -->
          <div class="relative h-auto p-4">
            <div>
              <div class="px-1 py-2">
                <table class="whitespace-no-wrapw-full whitespace-no-wrap table-fixed rounded text-sm">
                  <thead>
                    <tr class="bg-gray-400 text-center font-bold">
                      <td class="w-2/6 border border-gray-500 p-1">Course</td>
                      <!-- <td class="border border-gray-500 p-1">Result Date</td> -->
                      <td class="w-1/6 border border-gray-500 p-1">Start Date</td>
                      <td class="w-1/6 border border-gray-500 p-1">Without Late Fee End Date</td>
                      <td class="w-1/6 border border-gray-500 p-1">With Late Fee End Date</td>
                      <td class="w-1/6 border border-gray-500 p-1">Fine Fee End Date</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="odd:bg-green-200 hover:bg-blue-100">
                      <td class="border border-gray-500 text-sm">M.Com. &nbsp;BUSINESS ADMINISTRATION INEP 2023 CREDIT PATTERN</td>
                      <!-- <td class="border border-gray-500 p-1">31-Dec-2023</td> -->
                      <td class="primary border border-gray-500"> 18-Oct-2023</td>
                      <td class="border border-gray-500">24-Oct-2023</td>
                      <td class="border border-gray-500"> 01-Nov-2023</td>
                      <td class="border border-gray-500"> 05-Nov-2023</td>
                    </tr>
                    <tr class="odd:bg-green-200 hover:bg-blue-100">
                      <td class="border border-gray-500 text-sm">M.Com. Acounting INEP 2023 CREDIT PATTERN</td>
                      <!-- <td class="border border-gray-500 p-1">31-Dec-2023</td> -->
                      <td class="primary border border-gray-500"> 18-Oct-2023</td>
                      <td class="border border-gray-500">24-Oct-2023</td>
                      <td class="border border-gray-500"> 01-Nov-2023</td>
                      <td class="border border-gray-500"> 07-Nov-2023</td>
                    </tr>
                    <tr class="odd:bg-green-200 hover:bg-blue-100">
                      <td class="border border-gray-500 text-sm">M.Com. Costing INEP 2023 CREDIT PATTERN</td>
                      <!-- <td class="border border-gray-500 p-1">30-Dec-2023</td> -->
                      <td class="primary border border-gray-500"> 18-Oct-2023</td>
                      <td class="border border-gray-500">24-Oct-2023</td>
                      <td class="border border-gray-500"> 01-Nov-2023</td>
                      <td class="border border-gray-500"> 06-Nov-2023</td>
                    </tr>
                    <tr class="odd:bg-green-200 hover:bg-blue-100">
                      <td class="border border-gray-500 text-sm">Part I M.Sc. PHYSICSNEP 2023 CREDIT PATTERN</td>
                      <!-- <td class="border border-gray-500 p-1">30-Dec-2023</td> -->
                      <td class="primary border border-gray-500"> 18-Oct-2023</td>
                      <td class="border border-gray-500">24-Oct-2023</td>
                      <td class="border border-gray-500"> 01-Nov-2023</td>
                      <td class="border border-gray-500"> 05-Nov-2023</td>
                    </tr>
                    <tr class="odd:bg-green-200 hover:bg-blue-100">
                      <td class="border border-gray-500 text-sm">Part I M.Sc.ORGANIC CHEMISTRYNEP 2023 CREDIT PATTERN</td>
                      <!-- <td class="border border-gray-500 p-1">31-Dec-2023</td> -->
                      <td class="primary border border-gray-500"> 18-Oct-2023</td>
                      <td class="border border-gray-500">24-Oct-2023</td>
                      <td class="border border-gray-500"> 01-Nov-2023</td>
                      <td class="border border-gray-500"> 05-Nov-2023</td>
                    </tr>
                    <tr class="odd:bg-green-200 hover:bg-blue-100">
                      <td class="border border-gray-500 text-sm">Part I M.Sc. MATHEMATICSNEP 2023 CREDIT PATTERN</td>
                      <!-- <td class="border border-gray-500 p-1">31-Dec-2023</td> -->
                      <td class="primary border border-gray-500"> 18-Oct-2023</td>
                      <td class="border border-gray-500">24-Oct-2023</td>
                      <td class="border border-gray-500"> 01-Nov-2023</td>
                      <td class="border border-gray-500"> 05-Nov-2023</td>
                    </tr>
                    <tr class="odd:bg-green-200 hover:bg-blue-100">
                      <td class="border border-gray-500 text-sm">Part I M.Sc. GEOGRAPHYNEP 2023 CREDIT PATTERN</td>
                      <!-- <td class="border border-gray-500 p-1">31-Dec-2023</td> -->
                      <td class="primary border border-gray-500"> 18-Oct-2023</td>
                      <td class="border border-gray-500">24-Oct-2023</td>
                      <td class="border border-gray-500"> 01-Nov-2023</td>
                      <td class="border border-gray-500"> 05-Nov-2023</td>
                    </tr>
                    <tr class="odd:bg-green-200 hover:bg-blue-100">
                      <td class="border border-gray-500 text-sm">Part I M.Sc. ELECTRONICSNEP 2023 CREDIT PATTERN</td>
                      <!-- <td class="border border-gray-500 p-1">31-Dec-2023</td> -->
                      <td class="primary border border-gray-500"> 18-Oct-2023</td>
                      <td class="border border-gray-500">24-Oct-2023</td>
                      <td class="border border-gray-500"> 01-Nov-2023</td>
                      <td class="border border-gray-500"> 05-Nov-2023</td>
                    </tr>
                    <tr class="odd:bg-green-200 hover:bg-blue-100">
                      <td class="border border-gray-500 text-sm">Part I M.Sc.ANALYTICAL CHEMISTRYNEP 2023 CREDIT PATTERN</td>
                      <!-- <td class="border border-gray-500 p-1">31-Dec-2023</td> -->
                      <td class="primary border border-gray-500"> 18-Oct-2023</td>
                      <td class="border border-gray-500">24-Oct-2023</td>
                      <td class="border border-gray-500"> 01-Nov-2023</td>
                      <td class="border border-gray-500"> 16-Nov-2023</td>
                    </tr>

                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="5">
                        <div class="mt-6">
                          <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                            <div class="flex flex-1 justify-between sm:hidden">
                              <span class="relative inline-flex cursor-default items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-500">
                                « Previous
                              </span>

                              <a href="https://exam.sangamnercollege.edu.in/studhome?page=2" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700">
                                Next »
                              </a>
                            </div>

                            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                              <div>
                                <p class="text-sm leading-5 text-gray-700">
                                  Showing
                                  <span class="font-medium">1</span>
                                  to
                                  <span class="font-medium">9</span>
                                  of
                                  <span class="font-medium">46</span>
                                  results
                                </p>
                              </div>
                              <div>
                                <span class="relative z-0 inline-flex rounded-md shadow-sm">

                                  <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                                    <span class="relative inline-flex cursor-default items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-500" aria-hidden="true">
                                      <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                      </svg>
                                    </span>
                                  </span>

                                  <span aria-current="page">
                                    <span class="relative -ml-px inline-flex cursor-default items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-500">1</span>
                                  </span>
                                  <a href="https://exam.sangamnercollege.edu.in/studhome?page=2" class="relative -ml-px inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700" aria-label="Go to page 2">
                                    2
                                  </a>
                                  <a href="https://exam.sangamnercollege.edu.in/studhome?page=3" class="relative -ml-px inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700" aria-label="Go to page 3">
                                    3
                                  </a>
                                  <a href="https://exam.sangamnercollege.edu.in/studhome?page=4" class="relative -ml-px inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700" aria-label="Go to page 4">
                                    4
                                  </a>
                                  <a href="https://exam.sangamnercollege.edu.in/studhome?page=5" class="relative -ml-px inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700" aria-label="Go to page 5">
                                    5
                                  </a>
                                  <a href="https://exam.sangamnercollege.edu.in/studhome?page=6" class="relative -ml-px inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700" aria-label="Go to page 6">
                                    6
                                  </a>

                                  <a href="https://exam.sangamnercollege.edu.in/studhome?page=2" rel="next" class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-500 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-400 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-500" aria-label="Next &amp;raquo;">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                      <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                  </a>
                                </span>
                              </div>
                            </div>
                          </nav>
                        </div>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full">
      <!-- Card -->
      <div class="mx-2 rounded-md bg-white dark:bg-darker">
        <!-- Card body -->
        <div class="relative h-auto p-4">
          <p>After completing above steps your profile will be complete and you can fill exam form by clicking Exam Form button from dashboard.</p>
          <p>वरील टप्पे पूर्ण केल्यानंतर आपले प्रोफाइल पूर्ण होईल आणि आपण डॅशबोर्डवरील Exam Form बटनावर क्लिक करून परीक्षा फॉर्म भरू शकता.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

