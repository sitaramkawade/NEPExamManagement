<?php

namespace App\Livewire\Faculty\InternalAudit\HodAssignTool;

use Livewire\Component;

class AllHodAssignTool extends Component
{
    public function render()
    {
        return view('livewire.faculty.internal-audit.hod-assign-tool.all-hod-assign-tool')->extends('layouts.faculty')->section('faculty');
    }
}
