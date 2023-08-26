<?php
namespace App\Http\Livewire\Admin;
use Livewire\Component;

class StudentRegistration extends Component
{
    public $level='1';
    public $levelMapping=[
        '1'=>['name'=>'personal','next'=>'2'],
        '2'=>["name"=>"parent",'pre'=>'1','next'=>'3'],
        '3'=>["name"=>"personal",'pre'=>'2','next'=>'4'],
        '4'=>["name"=>"personal",'pre'=>'3','next'=>'5'],
        '5'=>["name"=>"personal",'pre'=>'4']
    ];

    public $studentData1=[
        'personal'=>[
            'firstname'=>null,
            'middlename'=>null,
            'lastname'=>null,
            'dob'=>null,
            'gender'=>null,
            'email'=>null,
            'phone'=>null,
            'aadhaar'=>null,
        ],
        'parent'=>[
            'fathername'=>null,
            'mothername'=>null,
            'fatherphone'=>null,
            'motherphone'=>null,
            'fatheroccupation'=>null,
        ],
        'address'=>[
            'current'=>[
                'state'=>null,
                'district'=>null,
                'city'=>null,
                'msv'=>null,
                'house_number'=>null,
                'pin_code'=>null
            ],
            'permanent'=>[
                'state'=>null,
                'district'=>null,
                'city'=>null,
                'msv'=>null,
                'house_number'=>null,
                'pin_code'=>null
            ]
        ]
    ];

    public $studentData=[
        'firstname'=>null,
        'middlename'=>null,
        'lastname'=>null,
        'dob'=>null,
        'gender'=>null,
        'email'=>null,
        'phone'=>null,
        'aadhaar'=>null,
        'fathername'=>null,
        'mothername'=>null,
        'fatherphone'=>null,
        'motherphone'=>null,
        'fatheroccupation'=>null,
        'address'=>[
            'current'=>[
                'state'=>null,
                'district'=>null,
                'city'=>null,
                'msv'=>null,
                'house_number'=>null,
                'pin_code'=>null
            ],
            'permanent'=>[
                'state'=>null,
                'district'=>null,
                'city'=>null,
                'msv'=>null,
                'house_number'=>null,
                'pin_code'=>null
            ]
        ],
        'previous_qualification'=>[
            'class'=>null,
            'school_name'=>null,
            'year'=>null,
            'status'=>null
        ]
    ];

    public function saveAndNext(){ 
        dd($this->levelMapping[$this->level]['name']);
        $this->level=$this->levelMapping[$this->level][1];
    }

    public function saveAndPrevious(){
        $this->level=$this->levelMapping[$this->level][0];
    }

    public function finalSubmit(){
        dd($this->studentData);
    }

    public function render()
    {
        return view('livewire.admin.student-registration');
    }
}
