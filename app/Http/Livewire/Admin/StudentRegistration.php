<?php
namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Services\Students;

class StudentRegistration extends Component
{
    public $level='1';
    public $levelMapping=[
        '1'=>['name'=>'personal','next'=>'2'],
        '2'=>["name"=>"parent",'pre'=>'1','next'=>'3'],
        '3'=>["name"=>"address",'pre'=>'2','next'=>'4'],
        '4'=>["name"=>"previous_qualification",'pre'=>'3','next'=>'5'],
        '5'=>["name"=>"personal",'pre'=>'4']
    ];

    public $studentData=[
        'personal'=>[
            'registration_number'=>null,
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
        ],
        'previous_qualification'=>[
            'class'=>null,
            'school_name'=>null,
            'year'=>null,
            'status'=>null
        ]

    ];

    // public $studentData=[
    //     'firstname'=>null,
    //     'middlename'=>null,
    //     'lastname'=>null,
    //     'dob'=>null,
    //     'gender'=>null,
    //     'email'=>null,
    //     'phone'=>null,
    //     'aadhaar'=>null,
    //     'fathername'=>null,
    //     'mothername'=>null,
    //     'fatherphone'=>null,
    //     'motherphone'=>null,
    //     'fatheroccupation'=>null,
    //     'address'=>[
    //         'current'=>[
    //             'state'=>null,
    //             'district'=>null,
    //             'city'=>null,
    //             'msv'=>null,
    //             'house_number'=>null,
    //             'pin_code'=>null
    //         ],
    //         'permanent'=>[
    //             'state'=>null,
    //             'district'=>null,
    //             'city'=>null,
    //             'msv'=>null,
    //             'house_number'=>null,
    //             'pin_code'=>null
    //         ]
    //     ],
    //     'previous_qualification'=>[
    //         'class'=>null,
    //         'school_name'=>null,
    //         'year'=>null,
    //         'status'=>null
    //     ]
    // ];

    public function saveAndNext(Students $student){ 
        //dd($this->studentData);
        $levelName=$this->levelMapping[$this->level]['name'];
        $res=$student->save($levelName,$this->studentData[$levelName]);
        $this->studentData[$levelName]['registration_number']=$res;
        dd($this->studentData);
        $this->level=$this->levelMapping[$this->level]['next'];
    }

    public function saveAndPrevious(){
        $this->level=$this->levelMapping[$this->level]['pre'];
    }

    public function finalSubmit(){
        dd($this->studentData);
    }

    public function render()
    {
        return view('livewire.admin.student-registration');
    }
}
