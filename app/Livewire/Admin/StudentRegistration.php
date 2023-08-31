<?php
namespace App\Livewire\Admin;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\Students;

class StudentRegistration extends Component
{
    use WithFileUploads;
    public $level='5';
    public $student_photo;
    public $levelMapping=[
        '1'=>['name'=>'personal','next'=>'2'],
        '2'=>["name"=>"parent",'pre'=>'1','next'=>'3'],
        '3'=>["name"=>"address",'pre'=>'2','next'=>'4'],
        '4'=>["name"=>"previous_qualification",'pre'=>'3','next'=>'5'],
        '5'=>["name"=>"personal",'pre'=>'4']
    ];

    public $studentData=[
        'id'=>null,
        'registration_number'=>'123',
        'firstname'=>null,
        'middlename'=>null,
        'lastname'=>null,
        'dob'=>null,
        'gender'=>null,
        'email'=>null,
        'phone'=>null,
        'aadhaar'=>null,
        'state'=>null,
        'district'=>null,
        'city'=>null,
        'msv'=>null,
        'house_number'=>null,
        'area_location'=>null,
        'pin_code'=>null,
        'photos'=>null,
        'aadhaar'=>null,
        'marksheets'=>null,
        'tc'=>null,
        'parent'=>[
            'fathername'=>null,
            'mothername'=>null,
            'fatherphone'=>null,
            'motherphone'=>null,
            'fatheroccupation'=>null,
        ],
        'previous_qualification'=>[
            'class'=>null,
            'school_name'=>null,
            'year'=>null,
            'status'=>null
        ]

    ];

    public $documents=[
        'photos'=>null,
        'aadhaar'=>null,
        'marksheets'=>null,
        'tc'=>null,
    ];

    public function saveAndNext(Students $student){ 
        $levelName=$this->levelMapping[$this->level]['name'];
        $res=$student->save($levelName,json_decode(json_encode($this->studentData)));
        if($levelName=='personal'){
            $this->studentData['registration_number']=$res['reg_number'];
            $this->studentData['id']=$res['student_id'];
        }
        $this->level=$this->levelMapping[$this->level]['next'];
    }
    public function saveAndPrevious(){
        $this->level=$this->levelMapping[$this->level]['pre'];
    }

    public function uploadFiles($url){
        $this->validate(
            [
                'documents.photos' => 'mimes:jpg,png|max:1024',
                'documents.aadhaar' => 'mimes:pdf|max:1024'
            ],
            [
                'documents.photos.mimes' => 'Only jpg and png allowed',
                'documents.aadhaar.mimes' => 'Only pdf allowed',
            ],
        );
        $regNumber=$this->studentData['registration_number'];
        $document=$this->documents[$url];
        $extension=$document->getClientOriginalExtension();
        $document_name=$regNumber.'.'.$extension;
        $document->storeAs('uploads/student_data/'.$url,$document_name, 'custom_public');
        $this->studentData[$url]=$document_name;
    }

    public function finalSubmit(){
        dd($this->studentData);
    }

    public function render()
    {
        return view('livewire.admin.student-registration');
    }
}