<?php

namespace App\Livewire\User\sanstha;

use Excel;
use App\Models\College;
use App\Models\Sanstha;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\user\ExportSanstha;

class ViewSanstha extends Component
{
    use WithPagination;
    public $perPage=10;
    public $page = 1;
    public $sno;
    public $search='';
    public $sortColumn="sanstha_name";
    public $sortColumnBy="ASC";
    public $data;
   
    public $ext;
   

    public function sort_column($column)
    {   
        if( $this->sortColumn === $column)
        {
            $this->sortColumnBy=($this->sortColumnBy=="ASC")?"DESC":"ASC";
            return;
        }
        $this->sortColumn=$column;
        $this->sortColumnBy=="ASC";
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function export()
    {   
        $filename="Sanstha-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportSanstha($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportSanstha($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportSanstha($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
       
    }


    public function deleteSanstha(Sanstha $sanstha)
    {
       

        if ($sanstha) {
            // Delete the Sanstha and its related colleges
            $sanstha->colleges()->delete();
            $sanstha->delete();
            $this->mount();
            $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );

        }
    }


    public function render()
    {
      $sansthas=Sanstha::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.sanstha.view-sanstha',compact('sansthas'))->extends('layouts.user')->section('user');
    }
}
