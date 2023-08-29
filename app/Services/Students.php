<?php
namespace App\Services;
use App\Models\Student;
use Carbon\Carbon;

class Students
{
    public function save($url,$data){
        switch($url){
            case "personal":
                if(!$data->registration_number){
                    $res=Student::create([
                            'first_name'=>$data->firstname,
                            'middle_name'=>$data->middlename,
                            'last_name'=>$data->lastname,
                            'dob'=>$data->dob,
                            'gender'=>$data->gender,
                            'aadhaar_number'=>$data->aadhaar,
                            'email'=>$data->email,
                            'phone'=>$data->phone,
                        ]);
                    if($res){
                        $regNumber='1'.Carbon::now()->year.$res->id;
                        Student::where('id',$res->id)->update([
                            'registration_number'=>$regNumber
                        ]);
                    }
                    return $regNumber;
                }
                else{
                    Student::where('registration_number',$data->registration_number)->update([
                        'first_name'=>$data->firstname,
                        'middle_name'=>$data->middlename,
                        'last_name'=>$data->lastname,
                        'dob'=>$data->dob,
                        'gender'=>$data->gender,
                        'aadhaar_number'=>$data->aadhaar,
                        'email'=>$data->email,
                        'phone'=>$data->phone,
                    ]);
                    return true;
                }
                break;
            case "parent":
                break;
            case "address":
                break;
            case "previous_qualification":
                break;
        }
    }
}