<?php

namespace App\Livewire\Faculty\RND;

use Livewire\Component;
use App\Models\Roletype;
use Livewire\WithPagination;

class RNDPage extends Component
{
    use WithPagination;

    public $perPage=10;
    public $search='';
    public $sortColumn="roletype_name";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $ext;
    public $isDisabled = true;

    public function render()
    {
        $roletypes = Roletype::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.r-n-d.r-n-d-page',compact('roletypes'))->extends('layouts.faculty')->section('faculty');
    }
}
