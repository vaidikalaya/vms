<?php
namespace App\Services;
use App\Models\{Student,StudentParent,StudentClass};
use Carbon\Carbon;

class Students
{
    public function save($url,$studentData){
        switch($url){
            case "personal":
                if(!$studentData->id){
                    $res=Student::create([
                            'first_name'=>$studentData->firstname,
                            'middle_name'=>$studentData->middlename,
                            'last_name'=>$studentData->lastname,
                            'dob'=>$studentData->dob,
                            'gender'=>$studentData->gender,
                            'aadhaar_number'=>$studentData->aadhaar,
                            'email'=>$studentData->email,
                            'phone'=>$studentData->phone,
                        ]);
                    if($res){
                        $regNumber='1'.Carbon::now()->year.$res->id;
                        Student::where('id',$res->id)->update([
                            'registration_number'=>$regNumber
                        ]);
                    }
                    return ['reg_number'=>$regNumber,'student_id'=>$res->id];
                }
                else{
                    Student::where('id',$studentData->id)->update([
                        'first_name'=>$studentData->firstname,
                        'middle_name'=>$studentData->middlename,
                        'last_name'=>$studentData->lastname,
                        'dob'=>$studentData->dob,
                        'gender'=>$studentData->gender,
                        'aadhaar_number'=>$studentData->aadhaar,
                        'email'=>$studentData->email,
                        'phone'=>$studentData->phone,
                    ]);
                    return true;
                }
                break;
            case "parent":
                StudentParent::updateOrCreate(
                    ['student_id'=>$studentData->id],
                    [
                        'father_name'=>$studentData->parent->fathername,
                        'mother_name'=>$studentData->parent->mothername,
                        'father_phone'=>$studentData->parent->fatherphone,
                        'mother_phone'=>$studentData->parent->fatherphone,
                        'father_occupation'=>$studentData->parent->fatheroccupation,
                        'student_id'=>$studentData->id
                    ]
                );
                break;
            case "address":
                Student::where('id',$studentData->id)->update([
                    'address'=>json_encode($studentData->address)
                ]);
                break;
            case "previous_qualification":
                Student::where('id',$studentData->id)->update([
                    'previous_qualification'=>json_encode($studentData->previous_qualification)
                ]);
                break;
        }
    }
}