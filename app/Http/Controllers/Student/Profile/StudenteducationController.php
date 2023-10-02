<?php

namespace App\Http\Controllers\Student\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudenteducationRequest;
use App\Models\Studentpreviousexam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudenteducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('student.education.index',[
            'studenteducations'=>Studentpreviousexam::where('student_id',Auth::user()->id)->get(),

        ]);
    }
     

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StoreStudenteducationRequest $request)
    {
 
        
      $datavalidated=  $request->validated();
        $datavalidated['percentage']= ($datavalidated['obtained_marks']/ $datavalidated['total_marks']*100);
        $datavalidated['passing_year']= date('Y-m-d H:i', strtotime($datavalidated['passing_year']));
        Auth::user()->educationalcourses()->create( $datavalidated);
        
        
        
         
         
         return redirect()->route('student.EducationDetails.index')
                       ->with('success','Education Details Added successfully.');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $studenteducation=Studentpreviousexam::find($id);
        
        $studenteducation->delete();

        return back()->with('success','Education Qualification is deleted');
        
    }
}
