<?php

namespace App\Livewire\User\Helpline;

use Excel;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Studenthelpline;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use App\Models\Studenthelplinequery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Exports\User\Helpline\HelplineExport;

class AllHelpline extends Component
{   
    use WithFileUploads;
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="status";
    public $sortColumnBy="ASC";
    public $ext;

    public $helplinequeries;
    public $students;
    public $student_id;
    public $student_name;
    public $student_helpline_query_id;
    public $old_query;
    public $new_query;
    public $query;
    public $remark;
    public $description;
    public $current_query="Query";
    public $uploaded_documents=[];
    public $uploaded_documents_old=[];
    #[Locked] 
    public $edit_id;
    public $documents =[];

    public function rules()
    {
        $rules = [
            'student_id' => ['required', 'integer', Rule::exists('students', 'id')],
            'student_helpline_query_id' => ['required', 'integer', Rule::exists('student_helpline_queries', 'id')],
            'old_query' => ['required', 'string','max:255'],
            'new_query' => ['required', 'string','max:255'],
            'remark' => ['nullable', 'string','max:255'],
            'description' => ['nullable', 'string','max:400'],
        ];

        if(count($this->documents) >0)
        {   
            foreach ($this->documents as $doc) {
                $rules["uploaded_documents.".$doc->id] = ['required','image', 'max:300','mimes:png,jpg,jpeg'];
            }
        }

        return $rules;
    }

    public function messages()
    {   
        $messages = [
            'student_helpline_query_id.required' => 'Query Feild  is required.',
            'student_helpline_query_id.exists' => 'The selected Query is invalid.',
            'student_id.required' => 'Student Name Feild  is required.',
            'student_id.exists' => 'The selected Student Name is invalid.',

            'old_query.required' => 'The Current '.$this->current_query.' field is required.',
            'old_query.string' => 'The Current '.$this->current_query.' must be a string.',
            'old_query.max' => 'The Current '.$this->current_query.' must not exceed :max characters.',
            
            'new_query.required' => 'The New '.$this->current_query.' field is required.',
            'new_query.string' => 'The New '.$this->current_query.' must be a string.',
            'new_query.max' => 'The New '.$this->current_query.' must not exceed :max characters.',

            'description.required' => 'The Description field is required.',
            'description.string' => 'The Description must be a string.',
            'description.max' => 'The Description must not exceed :max characters.',
        ];
        if(count($this->documents) >0)
        {
            foreach ($this->documents as $doc) {
                $messages["uploaded_documents.".$doc->id.".required"] = "The ".$doc->document_name." is required.";
                $messages["uploaded_documents.".$doc->id.".image"] = "The ".$doc->document_name." must be an image.";
                $messages["uploaded_documents.".$doc->id.".max"] = "The ".$doc->document_name." must not exceed :max KB.";
                $messages["uploaded_documents.".$doc->id.".mimes"] = "The ".$doc->document_name." must be in PNG, JPG, or JPEG format.";
            }   

        }    

        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if($propertyName=='student_helpline_query_id'){
            $this->uploaded_documents=[];
        }
    }
    public function resetinput()
    {
        $this->student_id=null;
        $this->student_helpline_query_id=null;
        $this->old_query=null;
        $this->new_query=null;
        $this->remark=null;
        $this->description=null;
        $this->edit_id=null;
        $this->documents=[];
        $this->uploaded_documents = [];
        $this->uploaded_documents_old=[];
    }

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

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    public function export()
    {
        $filename="Helpline-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new HelplineExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new HelplineExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new HelplineExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function add()
    {
        $this->validate();

        $helpline = new Studenthelpline;
        $helpline->fill([
            'student_id' => $this->student_id,
            'student_helpline_query_id' => $this->student_helpline_query_id,
            'old_query' => $this->old_query,
            'new_query' => $this->new_query,
            'remark' => $this->remark,
            'description' => $this->description,
            'status' => 0,
        ]);
        $helpline->save();

        $path = 'student/helpline/documents/';
        foreach ($this->uploaded_documents as $key => $document) {
            $fileName = 'document-' . time().'-'.$key.'.' .  $document->getClientOriginalExtension();
            $document->storeAs($path, $fileName, 'public');
            $helpline->studenthelplineuploadeddocuments()->create([
                'student_helpline_id' =>  $helpline->id,
                'helpline_document_id' =>  $key,
                'helpline_document_path' => 'storage/' . $path . $fileName,
            ]);
        }

        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Helpline Request Created Successfully !!');
    }

    public function view(Studenthelpline $helpline)
    {   
        $this->query=null;
        $this->uploaded_documents_old=[];
        $this->student_name=Student::find($helpline->student_id)->student_name;
        $this->edit_id=  $helpline->id;
        $this->remark=  $helpline->remark;
        $this->student_helpline_query_id=  $helpline->student_helpline_query_id;
        $this->old_query=  $helpline->old_query;
        $this->new_query=  $helpline->new_query;
        $this->query=  $helpline->new_query;
        $this->description=  $helpline->description;

        $documents=$helpline->studenthelplineuploadeddocuments()->get();
        foreach($documents as $doc)
        {
            $this->uploaded_documents_old[$doc->helpline_document_id]=$doc->helpline_document_path;
        }
        $this->setmode('view');
    }

    public function update(Studenthelpline $helpline)
    {
        $this->validate();
         $helpline->fill([
            'student_id' => $this->student_id,
            'student_helpline_query_id' => $this->student_helpline_query_id,
            'old_query' => $this->old_query,
            'new_query' => $this->new_query,
            'remark' => $this->remark,
            'description' => $this->description,
            'status' => 0,
        ]);
        $helpline->update();
        
        $path = 'student/helpline/documents/';
        foreach ($this->uploaded_documents as $key => $document) {
            $fileName = 'document-' . time().'-'.$key.'.' .  $document->getClientOriginalExtension();
            $document->storeAs($path, $fileName, 'public');
            $existingDocument = $helpline->studenthelplineuploadeddocuments()->where('helpline_document_id', $key)->first();

            if ($existingDocument) {
                File::delete($existingDocument->helpline_document_path);
                $existingDocument->update(['helpline_document_path' => 'storage/' . $path . $fileName]);
            } else {
                $helpline->studenthelplineuploadeddocuments()->create([
                    'student_helpline_id' =>  $helpline->id,
                    'helpline_document_id' => $key,
                    'helpline_document_path' => 'storage/' . $path . $fileName,
                ]);
            }
        }
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Helpline Request Updated Successfully !!');

    }

    public function verify(Studenthelpline $helpline)
    {   
        $this->validate([
            'query'=>'required'
        ]);

        $helpline->update([
            'verified_by' =>  Auth::guard('user')->user()->id,
            'new_query'=>$this->query,
            'remark' => $this->remark,
            'status' => 1,
        ]);

        $this->remark=null;
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Helpline Request Verified Successfully !!');
    }

    public function approve(Studenthelpline $helpline)
    {   
        $this->validate([
            'query'=>'required'
        ]);

       if($query_name=$helpline->studenthelplinequery->query_name)
       {    
            $student=Student::find($helpline->student_id);
            switch($query_name)
            {
                case 'Student Name':
                    $student->update([
                        'student_name'=>$this->query,
                    ]);

                    $this->dispatch('alert',type:'success',message:'Student Name Change Request Completed Successfully !!');
                break;
                case 'Mother Name':
                    $student->update([
                        'mother_name'=>$this->query,
                    ]);
                    $this->dispatch('alert',type:'success',message:'Mother Name Change Request Completed Successfully !!');
                break;
                case 'Mobile Number':
                    $student->update([
                        'mobile_no'=>$this->query,
                    ]);
                    $this->dispatch('alert',type:'success',message:'Mobile Number Change Request Completed Successfully !!');
                break;
                case 'Email ID':
                    $student->update([
                        'email'=>$this->query,
                        'email_verified_at'=>null,
                    ]);
                    $this->dispatch('alert',type:'success',message:'Email ID Change Request Completed Successfully !!');
                break;
            }

            $helpline->update([
                'approve_by' =>  Auth::guard('user')->user()->id,
                'new_query'=>$this->query,
                'remark' => $this->remark,
                'status' => 2,
            ]);
        }
        $this->query=null;
        $this->remark=null;
        $this->setmode('all');
        
    }

    public function reject(Studenthelpline $helpline)
    {   
        $helpline->update([
            'verified_by' =>  Auth::guard('user')->user()->id,
            'remark' => $this->remark,
            'status' => 4,
        ]);

        $this->remark=null;
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Helpline Request Approved Successfully !!');
    }

    public function status(Studenthelpline $helpline)
    {   
        if( $helpline->status==0)
        {   
            $helpline->status=1;
        }
        else if( $helpline->status==1)
        {   
            $helpline->status=4;
        }
        
        $helpline->verified_by= Auth::guard('user')->user()->id;
        $helpline->update();

        $this->dispatch('alert',type:'success',message:'Helpline Query Status Updated Successfully !!');
    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Studenthelpline  $helpline)
    {   
        $helpline->delete();
        $this->dispatch('alert',type:'success',message:'Helpline Request Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $helpline = Studenthelpline::withTrashed()->find($id);
        $helpline->restore();
        $this->dispatch('alert',type:'success',message:'Helpline Request Restored Successfully !!');
    }

    public function forcedelete()
    {   
        try 
        {
            $helpline = Studenthelpline::withTrashed()->find($this->delete_id);
            if ($helpline->studenthelplineuploadeddocuments()->exists()) {
                $helpline->studenthelplineuploadeddocuments->each(function ($doc) {
                    if ($doc->helpline_document_path) {
                        File::delete($doc->helpline_document_path);
                    }
                    $doc->delete();
                });
            }
            $helpline->forceDelete();
            $this->dispatch('alert',type:'success',message:'Helpline Request Deleted Successfully !!');
            
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
        }
    }

    public function render()
    {   
        if($this->mode!=='all')  
        {   
            if ($this->student_helpline_query_id) {
    
                $query = Studenthelplinequery::with('studenthelplinedocuments')->findOrFail($this->student_helpline_query_id);
                $this->current_query = $query->query_name;
                $this->documents = $query->studenthelplinedocuments;

            }
    
            $this->helplinequeries = Studenthelplinequery::where('is_active', 1)->pluck('query_name','id');
            $this->students = Student::where('status', 0)->pluck('student_name','id');
        }

        $student_helplines=Studenthelpline::select('id','student_id','student_helpline_query_id', 'remark','verified_by','approve_by','status','deleted_at')
        ->with(['student:student_name,id','studenthelplinequery:query_name,id','verified:name,id','approved:name,id'])->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        return view('livewire.user.helpline.all-helpline', compact('student_helplines'))->extends('layouts.user')->section('user');
    }

}
