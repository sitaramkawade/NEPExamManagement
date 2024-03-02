<x-studapp-layout>
  <style>
    input[type='checkbox'][readonly] {
      pointer-events: none;
    }
  </style>
  <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <div class="flex flex-col">

      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <form method="post" action="{{ route('student.saveexamform') }}">

              @csrf
              @php

                $current_classes = $student->currentclassstudents;

              @endphp

              <table class="min-w-full">
                <tr>
                  <td>
                    <div class="p-6">
                      <div>
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                          <label for="mediumofans" class="block font-semibold text-sm text-gray-700">Medium of Answer </label>
                          <select name="mediumofans" id="mediumofans" class="form-input rounded-md shadow-sm mt-1 block " required>
                            <option value="">--Select--</option>
                            <option value="M">Marathi</option>
                            <option value="H">Hindi</option>
                            <option value="E">English</option>
                          </select>
                          @error('mediumofans')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>

              <table border="1" class="min-w-full table table-striped divide-y divide-gray-200 rounded m-2">
                <tbody class="bg-white divide-y divide-gray-200">

                  @php
                    $show_backloag_subjects = true;
                  @endphp
                  @if (isset($current_classes))
                    @foreach ($current_classes as $current_class_entry)
                      @if ($current_class_entry->markssheetprint_status != -1)

                        @php
                          $backlog_subjects = $student->getsubjects($current_class_entry->patternclass_id, $current_class_entry->sem);
                        @endphp

                        @if (isset($backlog_subjects))

                          @foreach ($backlog_subjects->sortBy('subject_sem') as $subject)
                            @php
                              $student_mark_last_entry = $student->getmarksforexamform($subject->id, $current_active_exams->first()->id);
                            @endphp
                            @if ($student_mark_last_entry != '-5')
                              @php
                                $failstatus = $subject->checkstatus($student);
                              @endphp

                              @if (!(($failstatus == 'I' or $failstatus == 'INTP' or $failstatus == 'IINTP') and $subject->subject_sem % 2 != $examsession % 2 and $subject->subject_type != 'IEG') or ($failstatus == 'IEG' or $failstatus == 'I' or $failstatus == 'G' or $failstatus == 'EG') and ($subject->subject_type == 'IEG' or $subject->subject_type == 'G' or $subject->subject_type == 'IG') or $subject->patternclass_id >= 1 or $oddevensixsem == true)

                                @if ($student_mark_last_entry->grade == 'F' or $student_mark_last_entry->grade == '-1' or $student_mark_last_entry->grade == 'Ab')
                                  @if ($show_backloag_subjects == true)
                                    <thead>
                                      <tr class="bg-green-500 ">
                                        <th colspan="8" class="py-2 m-2"> Subject Details</th>
                                      </tr>
                                      <tr class="bg-gray-500 text-white text-bold ">
                                        <th scope="col" class="px-6 py-3 text-left text-xs  text-white uppercase tracking-wider">
                                          Sem
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                                          Subject Code
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                                          Subject Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                                          Internal
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                                          External
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                                          Practical
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                                          Grade
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                                          Project
                                        </th>

                                      </tr>
                                    </thead>
                                    <tr>
                                      <td colspan="8" class=" text-center font-semibold  bg-gray-500">Backlog Subject</td>
                                    </tr>
                                    @php $show_backloag_subjects=false; @endphp
                                  @endif
                                  <tr>
                                    <td class="px-6 py-3 whitespace-nowrap">
                                      <div class="flex items-center">

                                        <div class="ml-3">
                                          <div class="text-sm font-medium text-gray-900">
                                            {{ $subject->subject_sem }}
                                          </div>

                                        </div>
                                      </div>
                                    </td>
                                    <td class="px-6 py-3 whitespace-nowrap">
                                      <div class=" px-6   whitespace-nowrap text-sm text-gray-500">
                                        <input type="hidden" name="subbacklog[]" value="{{ $subject->id }}">
                                        <input type="hidden" name="{{ $subject->id }}" value="{{ $subject->subject_type }}">
                                        {{ $subject->subject_code }}
                                      </div>

                                    </td>
                                    <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                      {{ $subject->subject_name }}

                                    </td>

                                    <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                      {{--    //odd sem internal logic --}}
                                      <input type="checkbox" value={{ $subject->id }} name="binternal[]" id="binternal[]" @if ($failstatus == 'I' || $failstatus == 'IP' || $failstatus == 'IE' || $failstatus == 'IEP' || $failstatus == 'IEG') @if ($subject->patternclass_id >= 1 or $oddevensixsem == true) 
                                            checked  
                                        @else @if ($subject->subject_sem % 2 == $examsession % 2) 
                                        checked @endif @endif

                                @endif
                                readonly >
                                </td>
                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" value={{ $subject->id }} name="bexternal[]" id="bexternal[]" @if ($failstatus == 'E' || $failstatus == 'IE' || $failstatus == 'IEP' || $failstatus == 'EP' || $failstatus == 'EINTP') checked @endif @if ($failstatus == 'EG' || $failstatus == 'IEG') checked @endif readonly>
                                </td>
                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" value={{ $subject->id }} name="bpractical[]" @if ($subject->subject_category != 'Project' && ($failstatus == 'P' || $failstatus == 'INTP' || $failstatus == 'IP' || $failstatus == 'IEP' || $failstatus == 'EP' || $failstatus == 'EINTP')) checked @endif readonly>
                                </td>

                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" value={{ $subject->id }} name="bgrade[]" @if ($failstatus == 'G') checked @endif readonly>
                                </td>

                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" name="bproject[]" value={{ $subject->id }} @if ($subject->subject_category == 'Project' && ($failstatus == 'P' || $failstatus == 'INTP' || $failstatus == 'IP')) checked @endif readonly>
                                </td>
                                <!-- <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                        <input type="checkbox"  name="boral[]" readonly >
                                    </td> -->
                                </tr>

                              @endif
                            @endif
                          @endif
                        @endforeach
                      @endif

                    @endif
                  @endforeach
                  @endif
                  <!--Remaining backlog subject ... -->

                  @if ($backlog_subjectspreviousem != null)
                    @foreach ($backlog_subjectspreviousem as $subject)
                      <tr>

                        <td class="px-6 py-3 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="ml-3">
                              <div class="text-sm font-medium text-gray-900">
                                {{ $subject->subject_sem }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                          <div class=" px-6   whitespace-nowrap text-sm text-gray-500">
                            @if ($subject->subject_type != 'IEG' && $subject->subject_type != 'IG' && $subject->subject_type != 'I' && $oddevensixsem == true)
                              <input type="hidden" name="subbacklog1[]" value="{{ $subject->id }}">
                            @endif
                            <input type="hidden" name="{{ $subject->id }}" value="{{ $subject->subject_type }}">

                            {{ $subject->subject_code }}
                          </div>

                        </td>
                        {{-- <td><input type="checkbox"  value={{$subject->id}} id="subject[]" name="subject[]" ></td> --}}
                        <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                          {{ $subject->subject_name }}

                        </td>
                        @if ($subject->subject_type == 'IE')

                          <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                            <input type="checkbox" value={{ $subject->id }} name="internal[]" id="internal[]" @if ($subject->patternclass_id >= 1 or $oddevensixsem == true) checked  @else @if ($subject->subject_sem % 2 == $examsession % 2) checked @endif @endif readonly >
                          </td>
                          <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                            <input type="checkbox" value={{ $subject->id }} name="external[]" readonly checked>
                          </td>
                          <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                            <input type="checkbox" name="practical[]" readonly>
                          </td>
                        @else
                          @if ($subject->subject_type == 'IP')
                            <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                              <input type="checkbox" value={{ $subject->id }} name="internal[]" @if ($subject->patternclass_id >= 1 or $oddevensixsem == true) checked  @else @if ($subject->subject_sem % 2 == $examsession % 2) checked @endif @endif readonly >
                            </td>
                            <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                              <input type="checkbox" name="external[]" readonly>
                            </td>
                            <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                              <input type="checkbox" value={{ $subject->id }} name="external[]" readonly checked>
                            </td>
                          @else
                            @if ($subject->subject_type == 'IEP')
                              <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                <input type="checkbox" value={{ $subject->id }} name="internal[]" @if ($subject->patternclass_id >= 1 or $oddevensixsem == true) checked  @else @if ($subject->subject_sem % 2 == $examsession % 2) checked @endif @endif readonly >
                              </td>
                              <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                <input type="checkbox" value={{ $subject->id }} name="external[]" readonly checked>
                              </td>
                              <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                <input type="checkbox" value={{ $subject->id }} name="external[]" readonly checked>
                              </td>
                            @else
                              @if ($subject->subject_type == 'IEG')

                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" value={{ $subject->id }} name="internal[]" id="internal[]" checked readonly>
                                </td>

                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" value={{ $subject->id }} name="external[]" readonly checked>
                                </td>

                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" name="practical[]" readonly>
                                </td>
                              @else
                                @if ($subject->subject_type == 'I')
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" value={{ $subject->id }} name="internal[]" @if ($subject->patternclass_id >= 1) checked  @else @if ($subject->subject_sem % 2 == $examsession % 2) checked @endif @endif readonly >
                                  </td>
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" name="external[]" readonly>
                                  </td>
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" name="practical[]" readonly>
                                  </td>
                                @else
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" name="internal[]" readonly>
                                  </td>
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" name="external[]" readonly>
                                  </td>
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" name="practical[]" read only>
                                  </td>
                                @endif
                              @endif
                            @endif
                          @endif
                        @endif

                        <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                          @if ($subject->subject_type == 'G' || $subject->subject_type == 'IG')
                            <input type="checkbox" value={{ $subject->id }} name="grade[]" checked readonly>
                          @else
                            <input type="checkbox" name="grade[]" readonly>
                          @endif

                        </td>
                        <!-- <td class="px-6   whitespace-nowrap text-sm text-gray-500">
    <input type="checkbox"  name="project[]" readonly >
</td> -->
                        <!-- <td class="px-6   whitespace-nowrap text-sm text-gray-500">
    <input type="checkbox"  name="oral[]" readonly >
</td> -->
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
              @if ($subjectdata != null)
                <table border="1" class="min-w-full   divide-y divide-gray-200 rounded m-2 ">
                  <thead>
                    @if ($show_backloag_subjects == true)
                      <tr class="bg-green-500 ">
                        <th colspan="8" class="py-2 m-2"> Subject Details</th>
                      </tr>
                      @php $show_backloag_subjects=false; @endphp
                    @endif
                    <tr class="bg-gray-500 text-white text-bold ">
                      <th scope="col" class="px-6 py-3 text-left text-xs  text-white uppercase tracking-wider">
                        Sem
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                        Subject Code
                      </th>

                      <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                        Subject Name
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                        Internal
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                        External
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                        Practical
                      </th>

                      <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                        Grade
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">
                        Project
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr class=" bg-gray-500">
                      <th colspan="9">Regular Subject</th>
                    </tr>
                    @foreach ($subjectdata as $subject)

                      <tr class="odd:bg-gray-100">

                        <td class="px-6 py-3 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="ml-3">
                              <div class="text-sm font-medium text-gray-900">
                                {{ $subject->subject_sem }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                          <div class=" px-6   whitespace-nowrap text-sm text-gray-500">
                            <input type="hidden" name="sub[]" value="{{ $subject->id }}">
                            <input type="hidden" name="{{ $subject->id }}" value="{{ $subject->subject_type }}">
                            {{ $subject->subject_code }}
                          </div>

                        </td>
                        {{-- <td><input type="checkbox"  value={{$subject->id}} id="subject[]" name="subject[]" ></td> --}}
                        <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                          {{ $subject->subject_name }}

                        </td>
                        @if ($subject->subject_type == 'IE')

                          <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                            <input type="checkbox" value={{ $subject->id }} name="internal[]" id="internal[]" checked readonly>
                          </td>

                          <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                            <input type="checkbox" value={{ $subject->id }} name="external[]" readonly checked>
                          </td>

                          <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                            <input type="checkbox" name="practical[]" readonly>
                          </td>
                        @else
                          @if ($subject->subject_type == 'IEG')

                            <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                              <input type="checkbox" value={{ $subject->id }} name="internal[]" id="internal[]" checked readonly>
                            </td>

                            <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                              <input type="checkbox" value={{ $subject->id }} name="external[]" readonly checked>
                            </td>

                            <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                              <input type="checkbox" name="practical[]" readonly>
                            </td>
                          @else
                            @if ($subject->subject_type == 'IP')
                              <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                <input type="checkbox" value={{ $subject->id }} name="internal[]" checked readonly>
                              </td>
                              <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                <input type="checkbox" name="external[]" readonly>
                              </td>
                              @if ($subject->subject_category != 'Project')
                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" value={{ $subject->id }} name="practical[]" readonly checked>
                                </td>
                              @else
                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" readonly>
                                </td>
                              @endif
                            @else
                              @if ($subject->subject_type == 'IEP')
                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" value={{ $subject->id }} name="internal[]" checked readonly>
                                </td>
                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" value={{ $subject->id }} name="external[]" readonly checked>
                                </td>
                                <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                  <input type="checkbox" value={{ $subject->id }} name="practical[]" readonly checked>
                                </td>
                              @else
                                @if ($subject->subject_type == 'I')
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" value={{ $subject->id }} name="internal[]" checked readonly>
                                  </td>
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" name="external[]" readonly>
                                  </td>
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" name="practical[]" readonly>
                                  </td>
                                @else
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" name="internal[]" readonly>
                                  </td>
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" name="external[]" readonly>
                                  </td>
                                  <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                                    <input type="checkbox" name="practical[]" readonly>
                                  </td>
                                @endif
                              @endif
                            @endif
                          @endif
                        @endif

                        <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                          @if ($subject->subject_type == 'G' || $subject->subject_type == 'IG')
                            <input type="checkbox" value={{ $subject->id }} name="grade[]" checked readonly>
                          @else
                            <input type="checkbox" name="grade[]" readonly>
                          @endif

                        </td>

                        <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                          @if ($subject->subject_type == 'IP' && $subject->subject_category == 'Project')
                            <input type="checkbox" value={{ $subject->id }} name="project[]" readonly checked>
                          @else
                            <input type="checkbox" name="grade[]" readonly>
                          @endif
                        </td>

                    @endforeach
              @endif
              </tbody>
              </table>

              @if ($extracreditsub != null)
                <table border="1" class="min-w-full   divide-y divide-gray-200 rounded m-2">

                  <thead class=" text-center bg-gray-500  font-semibold ">
                    <tr class=" border border-red-darker">
                      <td colspan="9">Extra Credit Subject</td>
                    </tr>
                    <tr class=" m-1 text-white">
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium   uppercase tracking-wider">
                        Sem
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium   uppercase tracking-wider">
                        Subject Code
                      </th>

                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium   uppercase tracking-wider">
                        Subject Name
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium   uppercase tracking-wider">
                        Credit
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium   uppercase tracking-wider">
                        Grade
                      </th>

                    </tr>
                  </thead>
                  <tbody>

                    @php

                      $excrsubid = $student->getExtraCreditSubject(); //$student->intextracreditbatchseatnoallocations->where('grade','!=','NA')->pluck('subject_id');
                      //dd($excrsubid);
                    @endphp

                    @foreach ($extracreditsub->whereNotIn('id', $excrsubid)->sortBy('subject_code') as $subject)
                      <tr class="even:bg-gray-100">

                        <td class="px-6 py-3 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="ml-3">
                              <div class="text-sm font-medium text-gray-900">
                                {{ '-' }} {{-- {{ $subject->subject_sem }} --}}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                          <div class=" px-6   whitespace-nowrap text-sm text-gray-500">
                            <!-- <input type="hidden" name="sub[]" value="{{ $subject->id }}">
                                                        <input type="hidden" name="excr.{{ $subject->id }}" value="{{ $subject->subject_type }}"> -->
                            {{ $subject->subject_code }}
                          </div>

                        </td>
                        {{-- <td><input type="checkbox"  value={{$subject->id}} id="subject[]" name="subject[]" ></td> --}}
                        <td class="px-6   whitespace-nowrap text-sm text-gray-500">

                          {{ $subject->subject_name }}

                        </td>
                        <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                          {{ $subject->id == 47 ? 2 : $subject->subject_credit }}

                        </td>
                        <td class="px-6   whitespace-nowrap text-sm text-gray-500">
                          <input type="checkbox" value={{ $subject->id }} name="extracrd[]" id="extracrd[]">
                        </td>

                      </tr>
                    @endforeach

                  </tbody>
                </table>
              @endif

              <div class="   px-2 bg-gray-100 text-center">
                <a href="">
                  <button class=" m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" name="save" id="save">
                    Save and Next
                  </button>
                </a>
                <a href="{{ route('student.dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                  Cancel
                </a>
              </div>

            </form>

          </div>

        </div>
      </div>
    </div>

  </div>
  </div>
  {{-- <script>
    $(document).ready(function(){
        var count=0;
        var $checkboxes = $('#devel-generate-content-form td input[name="extracrdc"]');
       
    $checkboxes.change(function(){
         count = $checkboxes.filter(':checked').length;
    });
    
    $('.C').on('change', function() {
        $('.C').not(this).prop('checked', false);  
    });
   
    $('#save').on('click', function() {
        //alert(count);
        if(count==6)
        { 
            document.myform.action ="{{ route('student.saveexamform') }}";
        }
        else alert ("Select Any  5 Optional Subject From Group-B to Group-G")
    });
    });
    
    </script> --}}
</x-studapp-layout>
