<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Students;

class StudentsController extends Controller
{
    public function index(Students $student){
        dd($student->get());
    }

    public function studentRegistrationView(){
        return view('admin_team.student_registration');
    }
}
