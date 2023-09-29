<?php

namespace App\Livewire\Master;

use App\Models\State;
use App\Models\Village;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

    use WithPagination;
public $search="";
public $sortField="id";
public $sortDirection='desc';
public function sortBy($field){
   
    $this->sortField=$field;
}

    public function render()
    {

      //  sleep(1);
        return view('livewire.master.table' ,
        [ 'allstates'=>State::search('state_name',$this->search)
        
        ->orderBy( $this->sortField,$this->sortDirection)
        ->paginate(10),
        ]);
        
    }
}
 