<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function studentRegistrationView(){
        return view('admin_team.student_registration');
    }
}
