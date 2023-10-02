<?php

namespace App\Http\Controllers\Student\Profile;

use App\Http\Controllers\Controller;
use App\Models\Addresstype;
use App\Models\Studentaddress;
use Illuminate\Http\Request;

class StudentaddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    
          return view('student.address.index');
    }
     

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('student.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
     
        $studentaddress=Studentaddress::find($id);
        
        $studentaddress->delete();

        return back()->with('success','Address is deleted');
       
    }
}
