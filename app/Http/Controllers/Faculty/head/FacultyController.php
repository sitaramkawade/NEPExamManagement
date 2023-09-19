<?php

namespace App\Http\Controllers\Faculty\head;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Support\Facades\Auth;
class FacultyController extends Controller
{
    public function index()
    {
        //$user=User::all();
       
        $department_id= Auth::user()->department_id;
        $user=Faculty::where('department_id',$department_id)->get();
        return view("admin.teacher.index",compact('user'));
    }
}
