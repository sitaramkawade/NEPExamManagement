<?php

namespace App\Livewire\Faculty\InternalToolAuditor;

use Livewire\Component;

class AllInternalToolAuditor extends Component
{
    public function render()
    {
        return view('livewire.faculty.internal-tool-auditor.all-internal-tool-auditor')->extends('layouts.faculty')->section('faculty');
    }
}
