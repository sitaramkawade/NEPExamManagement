<?php

namespace App\Livewire\Faculty;

use App\Models\Faculty;
use Livewire\Component;

class RestoreFaculty extends Component
{
    public $delete_id;

    public function restoreFaculty($id)
    {
        $faculty = Faculty::withTrashed()->find($id);

        if ($faculty) {
            $faculty->restore();

            $bankDetails = $faculty->facultybankaccount()->onlyTrashed()->get();

            if ($bankDetails->isNotEmpty()) {
                foreach ($bankDetails as $bankDetail) {
                    $bankDetail->restore();
                }
            }

            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Faculty Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Faculty Not Found');
        }
        return redirect()->route('faculty.view.faculty');
    }

    public function mount($id)
    {
        $this->restoreFaculty($id);
    }

    public function render()
    {
        return view('livewire.faculty.restore-faculty')->extends('layouts.faculty')->section('faculty');
    }
}
