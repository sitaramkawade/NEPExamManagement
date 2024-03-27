<?php

namespace App\Http\Controllers\User\QuestionPaperBankPdf;

use Illuminate\Http\Request;
use App\Models\Questionpaperbank;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionPaperBankPdfController extends Controller
{
    public function preview_question_paper(Request $request)
    {   
        $questionpaperbank =Questionpaperbank::find($request->questionpaperbank);

        if($questionpaperbank->papersubmission->is_confirmed!==1 && $questionpaperbank->user_id === Auth::guard('user')->user()->id)
        {
            if($questionpaperbank->file_path)
            {
                return response()->file($questionpaperbank->file_path);
            }
            else
            {
                return abort(404);
            }

        }else
        {
            return abort(403);
        }
    }
}
