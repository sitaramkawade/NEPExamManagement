primary
primary-50
primary-100
primary-light
primary-lighter
primary-dark
primary-darker

green
blue
cyan
teal
fuchsia
violet


type:
error
info
success
warning

return redirect()->with('alert', ['type' => 'info', 'message' => 'Admin Logout Successfully !!']);
session()->flash('alert', ['type' => 'info', 'message' => 'Admin Logout Successfully !!']);
$this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  

Class:
        protected $listeners = ['delete-confirmed'=>'delete'];
        public $delete_id=null;



        public function deleteconfirmation($id)
            {
                $this->delete_id=$id;
                $this->dispatch('delete-confirmation');
            }

        public function delete()
            {
                $bed = Bed::withTrashed()->find($this->delete_id);
                if($bed){
                    $bed->forceDelete();
                    $this->delete_id=null;
                    $this->setmode('all');
                    $this->dispatch('alert',type:'success',message:'Bed Deleted Successfully !!');
                }else{
                    $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
                }
            }
View :

wire:click="deleteconfirmation(id)"

## model Name Changed

CasteCategory           ->  Castecategory
ClassStudmenumaster     ->  Classstudentmenumaster
CurrentclassStudents    ->  Currentclassstudent
DeptPrefix              ->  Departmentprefix
ExamBuilding            ->  Exambuilding
ExamOrderPost           ->  Examorderpost
ExamPatternclass        ->  Exampatternclass
ExamStudentseatno       ->  Examstudentseatno
Grade                   ->  Gradepoint   + table gradepoints
ExamTimetable           ->  Examtimetable
ExamPanel               ->  Exampanel
SubjectBucketTypeMaster ->  Subjectbuckettypemaster
SubjectTypeMaster       ->  Subjecttypemaster
