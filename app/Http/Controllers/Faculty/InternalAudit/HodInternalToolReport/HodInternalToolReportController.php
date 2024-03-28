<?php

namespace App\Http\Controllers\Faculty\InternalAudit\HodInternalToolReport;

use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facultyinternaldocument;

class HodInternalToolReportController extends Controller
{
    public function download_subject_tool_report(Request $request)
    {
        $record = Facultyinternaldocument::select('id','subject_id','academicyear_id','faculty_id','departmenthead_id')->where('id', $request->subject_tool_report_id)->where('status', 1)->get()->first();

        if($record)
        {
            $academic_year = $record->academicyear->year_name;
            $faculty = $record->faculty->faculty_name;
            $subject = $record->subject->subject_name;
            $department_head = $record->departmenthead->faculty->faculty_name;

            $all_tool_documents = Facultyinternaldocument::select('internaltooldocument_id', 'document_fileName', 'document_filePath')
                ->where('subject_id', $record->subject_id)
                ->get();

            if ($all_tool_documents) {
                $tools_and_documents = [];

                foreach ($all_tool_documents as $tool_document) {
                    // Assuming $tool_document->internaltooldocument_id is the foreign key
                    $tool_document_id = $tool_document->internaltooldocument_id;

                    // Check if the tool document id is not already in the array
                    if (!in_array($tool_document_id, array_column($tools_and_documents, 'internaltooldocument_id'))) {
                        // Fetch the tool document with relation
                        $tool_name = $tool_document->internaltooldocument->internaltoolmaster->toolname;
                        $document_name = $tool_document->internaltooldocument->internaltooldocumentmaster->doc_name;
                        $file_name = $tool_document->document_fileName;
                        $file_path = $tool_document->document_filePath;

                        // Add to the array
                        $tools_and_documents[] = [
                            'tool_name' => $tool_name,
                            'internaltooldocument_name' => $document_name,
                            'document_fileName' => $file_name,
                            'document_filePath' => $file_path,
                        ];
                    }
                }

                // Group the data by tool_name
                $grouped_internal_tools_docs = collect($tools_and_documents)->groupBy('tool_name');

                $pdf = PDF::loadView('pdf.faculty.hodinternaltoolreport.internal_tool_report_pdf', compact('grouped_internal_tools_docs','academic_year','faculty','subject','department_head'))->setPaper('a4', 'portrait')->setOptions(['images' => true, 'defaultFont' => 'sans-serif']);
                $pdf->output();
                return $pdf->stream('internal_tool_report.pdf');
            }
        }
    }


    // public function print_final_exam_form()
    // {
    //     $student = Auth::guard('student')->user();
    //     $active_exam = Exam::select('id')->Where('status',1)->first();
    //     if($active_exam)
    //     {
    //         $exam_form_master=$student->examformmasters->where('exam_id', $active_exam->id)->first();
    //         if($exam_form_master)
    //         {
    //             if($exam_form_master->printstatus==0)
    //             {
    //                 $exam_form_master->update(['printstatus'=>1]);
    //             }

    //             $pdf = PDF::loadView('pdf.student.exam_form.print_exam_form_pdf', compact('exam_form_master'))->setPaper('a4', 'portrait')->setOptions(['images' => true, 'defaultFont' => 'sans-serif']);
    //             $pdf->output();
    //             return $pdf->stream('exam_form.pdf');
    //         }
    //     }
    // }
}
