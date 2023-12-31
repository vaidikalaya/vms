<?php
namespace App\Services;
use App\Models\{Student,StudentParent,StudentClass};
use Carbon\Carbon;

class Students
{

    public function get($id=null){
        return Student::leftjoin('student_parents as parents','parents.student_id','students.id')
               ->select(
                    'students.*',
                    'parents.father_name','parents.mother_name','parents.father_phone','parents.mother_phone','father_occupation'
               )
               ->get();
    }

    public function save($url,$studentData){
        switch($url){
            case "personal":
                $regNumber;
                $studentId;
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
                        $studentId=$res->id;
                        $regNumber='1'.Carbon::now()->year.$res->id;
                        Student::where('id',$res->id)->update([
                            'registration_number'=>$regNumber
                        ]);
                    }
                }
                else{
                    $res=Student::where('id',$studentData->id)->update([
                        'first_name'=>$studentData->firstname,
                        'middle_name'=>$studentData->middlename,
                        'last_name'=>$studentData->lastname,
                        'dob'=>$studentData->dob,
                        'gender'=>$studentData->gender,
                        'aadhaar_number'=>$studentData->aadhaar,
                        'email'=>$studentData->email,
                        'phone'=>$studentData->phone,
                    ]);
                    $studentId=$studentData->id;
                    $regNumber=$studentData->registration_number;
                }
                $resClass=StudentClass::updateOrCreate(
                    ['student_id'=>$studentId,'class_id'=>$studentData->class],
                    [
                        'student_id'=>$studentId,
                        'class_id'=>$studentData->class,
                        'status'=>'current'
                    ]
                );
                if($res && $resClass){
                    return ['reg_number'=>$regNumber,'student_id'=>$studentId];
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
                    'state'=>$studentData->state,
                    'district'=>$studentData->district,
                    'city'=>$studentData->city,
                    'msv'=>$studentData->msv,
                    'house_number'=>$studentData->house_number,
                    'area_location'=>$studentData->area_location,
                    'pin_code'=>$studentData->pin_code,
                ]);
                break;
            case "previous_qualification":
                Student::where('id',$studentData->id)->update([
                    'previous_qualification'=>json_encode($studentData->previous_qualification)
                ]);
            case "documents":
                Student::where('id',$studentData->id)->update([
                    'photo'=>$studentData->photos,
                    'aadhaar_copy'=>$studentData->aadhaar_copy,
                    'aadhaar_copy'=>$studentData->marksheets,
                    'transfer_certificate'=>$studentData->tc
                ]);
                break;
        }
    }
}