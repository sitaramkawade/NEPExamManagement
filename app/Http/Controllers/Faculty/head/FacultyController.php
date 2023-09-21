<?php

namespace App\Http\Controllers\Faculty\head;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class FacultyController extends Controller
{
    public function index()
    {
        //$user=User::all();
       
        $department_id= Auth::user()->department_id;
        $user=Faculty::where('department_id',$department_id)->get();
        return view("faculty.head.index",compact('user'));
    }
    public function create()
    {
        $department_id= Auth::user()->department_id;
        $role=Role::where('id',4)->get();
        $dept=Department::where('id',$department_id)->get();
       
        $college=College::all();
        return view("faculty.head.create",compact('role','dept','college'));
     
    }
    public function store(Request $request)
    {

        
        Validator::make($request->all(), [
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:faculties'],
            'mobile'=> ['required','numeric' ],
            'dept' => ['required'],
            'college' => ['required'],
            'role' => ['required'],
            'account_no' => ['required','numeric'],
            'bank_address' => ['required'],
            'bank_name' => ['required'],
            'branch_code' => ['required'],
            'branch_name' => ['required'],
            
            'ifsc_code' => ['required'],
            'micr_code' => ['required'],
               
        ])->validate();

 
       $faculty= Faculty::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
            'password' =>Hash::make('password'),
            'role_id'=>$request['role'],
            'department_id'=>$request['dept'],
            'college_id'=>$request['college'],
            
        ]);

        $faculty->facultybankaccount()->create([
            'account_no'=>$request['account_no'],
            'bank_address'=>$request['bank_address'],                   
            'bank_name'=>$request['bank_name'],
            'branch_code'=>$request['branch_code'],
            'ifsc_code'=>$request['ifsc_code'],
            'micr_code'=>$request['micr_code'],
            'branch_name'=>$request['branch_name'],

        ]);
        //dd($request->all());

        return redirect()->route('admin.head.showfaculty')
        ->with('success','Faculty Created successfully.');
    }
    public function edit($id)
    { 
        $faculty=Faculty::find($id);
        $department_id= Auth::user()->department_id;
        $role=Role::where('id',4)->get();
        $dept=Department::where('id',$department_id)->get();
       
        $college=College::all();
        return view('faculty.head.edit',compact('faculty','role','dept','college'));
    }
    public function update(Request $request,$id):RedirectResponse
    { $faculty= Faculty::find($id);
       // dd($request->all());
        Validator::make($request->all(), [
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile'=> ['required','numeric' ],
            'dept' => ['required'],
            'college' => ['required'],
            'role' => ['required'],
            'account_no' => ['required','numeric'],
            'bank_address' => ['required'],
            'bank_name' => ['required'],
            'branch_code' => ['required'],
            'branch_name' => ['required'],
            
            'ifsc_code' => ['required'],
            'micr_code' => ['required'],
               
        ])->validate();
        //dd($request->all());
        //$faculty= Faculty::find(1);
       // dd($faculty);
        $faculty->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile_no' => $request['mobile'],
            'password' =>Hash::make('password'),
            'role_id'=>$request['role'],
            'department_id'=>$request['dept'],
            'college_id'=>$request['college'],
            
        ]);

        $faculty->facultybankaccount()->update([
            'account_no'=>$request['account_no'],
            'bank_address'=>$request['bank_address'],                   
            'bank_name'=>$request['bank_name'],
            'branch_code'=>$request['branch_code'],
            'ifsc_code'=>$request['ifsc_code'],
            'micr_code'=>$request['micr_code'],
            'branch_name'=>$request['branch_name'],

        ]);
        //dd($request->all());

        return redirect()->route('admin.head.showfaculty')
        ->with('success','Faculty details updated successfully.');
    }
    public function delete($id)
    { 
        $faculty=Faculty::find($id);
        $faculty->facultybankaccount->delete();
        $faculty->delete();

        return redirect()->route('admin.head.showfaculty');
    }
   public function  alldetails()
    { dd("all details");
    }
}
