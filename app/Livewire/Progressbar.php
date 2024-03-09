<?php

namespace App\Livewire;

use Livewire\Component;

class Progressbar extends Component
{   
    protected $listeners = ['progressbar'];
    public $total;
    public $completed;

    public function mount($total=100, $completed=0)
    {
        $this->total = $total;
        $this->completed = $completed;
    }

    public function progressbar($total, $completed)
    {
        $this->total = $total;
        $this->completed = $completed;
    }

    public function render()
    {
        return view('livewire.progressbar')->extends('layouts.student')->section('student');
    }
}
