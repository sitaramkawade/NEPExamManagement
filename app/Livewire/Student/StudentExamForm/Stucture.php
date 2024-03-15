<?php

public static function xyz()
{
        $this->regular_subjects_data = [];
        $this->extra_credit_subjects_data = [];
        $this->backlog_subjects_data = [];
        $this->exam_fee_courses = [];

        $current_active_exams = Exam::Where('status', 1)->get();
        $current_exam_session = null;
        $current_exam_session = $current_active_exams->first()->exam_sessions;
        $current_class_student_last_entry = $this->student->currentclassstudents->last();
        $current_class_inward_students = $this->student->currentclassstudents->where('pfstatus', '!=', -1)->where('markssheetprint_status', '!=', -1);

        if (true) 
        {
            if (is_null($current_class_student_last_entry)) 
            {
                // Fetch FY
                $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $this->student->patternclass_id)->get();

                if (!$admission_data->isEmpty()) 
                {
                    if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                    {
                        if ($current_exam_session != 2) 
                        {   
                            // Fetch FY SEM-I Regular Student // Done 
                        } 
                        else 
                        {   
                            // Fetch Direct SEM-II Regular Student With SEM-I As Backlog // Done 
                        }

                    } else 
                    {
                        $this->dispatch('alert', type: 'info', message: 'No Admission In The Current Year !!');
                    }
                } else 
                {
                    $this->dispatch('alert', type: 'info', message: 'Invalid Member ID Please Update Your Profile !!');
                }
            } else 
            {
                switch ($current_class_student_last_entry->sem) 
                {
                    case 1:
                        // Fetch FY SEM-II
                        $this->patternclass_id = $current_class_student_last_entry->patternclass_id;
                        
                        $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $this->patternclass_id)->get();

                        if (!$admission_data->isEmpty()) 
                        {
                            if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                            {   
                                // FY SEM-II Regular Student // Done
                            } 
                            else 
                            {   
                                // FY SEM-II Old Year Student // Done
                            }
                        } 
                        else 
                        {
                            $this->dispatch('alert', type: 'info', message: 'Invalid Member ID Please Update Your Profile !!');
                        }

                        break;
                    case 2:
                        // Fetch SY SEM-III
                        $this->patternclass_id = $current_class_student_last_entry->patternclass_id+1;
                        $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $this->patternclass_id)->get();
                        if (!$admission_data->isEmpty()) 
                        {   
                            if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                            {
                                $sem_1_data = $this->student->studentresults->where('sem', $current_class_student_last_entry->sem - 1)->last();
                                $sem_2_data = $this->student->studentresults->where('sem', $current_class_student_last_entry->sem)->last();
                                if (is_null($sem_1_data) && is_null($sem_2_data)) {
                                    if ($current_class_student_last_entry->markssheetprint_status = -1) 
                                    {   
                                        // Fetch Direct SY SEM-III // Done
                                    }
                                } else if (!(is_null($sem_1_data) && is_null($sem_2_data))) 
                                {
                                    $this->year_result = $this->student->get_year_result_exam_form($sem_1_data, $sem_2_data, $current_class_student_last_entry);
                                   
                                    if ($this->year_result == 0) 
                                    {   
                                        // Fetch FY SEM-I-II Fail Student  // Done
                                    } else 
                                    {
                                        if ($current_exam_session == 2) 
                                        {   
                                            // Fetch SY SEM-III Regular Student  // Done
                                        } else 
                                        {   
                                           
                                            // Fetch SY SEM-III Regular Student  // Done
                                        }
                                    }
                                }
                            } 
                            else 
                            {   
                                // FY SEM-I-II Fail OLD Year Student // Done
                            }
                        } else 
                        {
                            // FY SEM-I-II Fail Student // Done
                        }
                        break;
                    case 3:
                        // Fetch SY SEM-IV
                        $this->patternclass_id = $current_class_student_last_entry->patternclass_id;
                        $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $this->patternclass_id)->get();

                        if (!$admission_data->isEmpty()) 
                        {
                            if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                            {   
                                // Fetch SY SEM-IV
                                
                            } 
                            else 
                            {
                                // Fetch FY Fail Student
                                $this->regular_subjects_data = null;
                               
                            }
                        } 
                        else 
                        {
                            $this->dispatch('alert', type: 'info', message: 'Invalid Member ID Please Update Your Profile !!');
                        }

                        break;
                    case 4:;
                        // Fetch TY SEM-V
                        $this->patternclass_id = $current_class_student_last_entry->patternclass_id+1;
                        $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $this->patternclass_id)->get();

                        if (!$admission_data->isEmpty()) 
                        {
                            if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                            {
                                if ($current_class_inward_students->isEmpty()) 
                                {   
                                    // If Exam Form Not Inward Exam Not Given
                                    // Fetch SEM V // Done
                                    
                                }

                                if ($current_class_inward_students->count() == 4) 
                                {   
                                    // If Exam Form Inward And Exam Given
                                    $sem_1_data = $this->student->studentresults->where('sem', 1)->last();
                                    $sem_2_data = $this->student->studentresults->where('sem', 2)->last();

                                    if (!(is_null($sem_1_data) && is_null($sem_2_data))) 
                                    {   
                                        $this->year_result = $this->student->get_year_result_exam_form($sem_1_data, $sem_2_data, $current_class_student_last_entry);
                                        // Checking FY Result Not Pass
                                        if ($this->year_result != 1) 
                                        {   
                                            // Fetch Fail Or ATKT Student
                                           

                                        } 
                                        else 
                                        {   
                                            //  If FY Pass
                                            $sem_3_data = $this->student->studentresults->where('sem', 3)->last();
                                            $sem_4_data = $this->student->studentresults->where('sem', 4)->last();

                                            if (!(is_null($sem_3_data) && is_null($sem_4_data))) 
                                            {
                                                $this->year_result = $this->student->get_year_result_exam_form($sem_3_data, $sem_4_data, $current_class_student_last_entry);

                                                // Checking SY Result 
                                                if ($this->year_result == 0) 
                                                {   
                                                    // If SY Fail 
                                                    // Fetch Fail Student
                                                   
                                                  
                                                } 
                                                else 
                                                {   
                                                    // Fetch ATKT & Regular Student
                                                    if ($current_exam_session == 2) 
                                                    {                                           
                                                       
                                                    }
                                                     else 
                                                    {   
                                                      
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }

                                if ($current_class_inward_students->count() == 2) 
                                {
                                    $sem_1_data = $this->student->studentresults->where('sem', $current_class_student_last_entry->sem - 1)->last();
                                    $sem_2_data = $this->student->studentresults->where('sem', $current_class_student_last_entry->sem)->last();

                                    if (!(is_null($sem_1_data) && is_null($sem_2_data))) 
                                    {

                                        $this->year_result = $this->student->get_year_result_exam_form($sem_1_data, $sem_2_data, $current_class_student_last_entry);
                                        // Checking FY Result
                                        if ($this->year_result == 0) 
                                        {   
                                            // If FY Fail
                                            // Fetch Fail Student
                                           
                                        } else 
                                        {
                                            // Fetch Pass or ATKT Student
                                          
                                        }
                                    } else 
                                    {
                                        // Fail Student
                                      
                                    }
                                }
                            } 
                            else
                            {
                               
                            }
                        } 
                        else 
                        {
                            $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                            if (!$admission_data->isEmpty()) 
                            {
                                $this->regular_subjects_data = [];
                                $this->backlog_subjects_data = [];
                            } else {
                                $this->dispatch('alert', type: 'info', message: 'Invalid Member ID Please Update Your Profile !!');
                            }
                        }
                        break;
                    case 5:
                        // TY SEM-VI
                        $this->patternclass_id = $current_class_student_last_entry->patternclass_id;
                        $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id',$this->patternclass_id)->get();
                        if (!$admission_data->isEmpty()) 
                        {
                            if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                            {
                                // Fetch SEM-VI
                               
                            } 
                            else 
                            {   
                                // dd('TY SEM-V Fail ');
                                // Fail Student
                            }
                        } else 
                        {
                            $this->dispatch('alert', type: 'info', message: 'Invalid Member ID Please Update Your Profile !!');
                        }

                        break;
                    case 6:
                       
                        break;
                }
               
            }
        }

        return true;
}



?>