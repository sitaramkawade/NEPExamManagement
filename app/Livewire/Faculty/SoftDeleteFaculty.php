<?php

namespace App\Livewire\Faculty;

use App\Models\Faculty;
use Livewire\Component;
use App\Models\Facultybankaccount;

class SoftDeleteFaculty extends Component
{
    public $faculty_id;

    public function softdelete($id)
    {
        $faculty = Faculty::withTrashed()->find($id);

        if ($faculty) {
            $bankAccount = $faculty->facultybankaccount()->withTrashed()->first();
            if ($bankAccount) {
                $bankAccount->delete();
            }
            $faculty->delete();
            $this->dispatch('alert',type:'success',message:'Faculty Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Faculty Not Found !');
            }
        return redirect()->route('faculty.view.faculty');
    }


    public function mount($id)
    {
        $this->softdelete($id);
        $this->faculty_id = $id;
    }
    public function render()
    {
        return view('livewire.faculty.soft-delete-faculty')->extends('layouts.faculty')->section('faculty');
    }
}
