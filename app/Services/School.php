<?php
namespace App\Services;
use App\Models\{Classes};
use Carbon\Carbon;

class School
{

    public function classes(){
        Classes::all();
    }
}