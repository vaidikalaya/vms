<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[
        'registration_number',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'gender',
        'aadhaar_number',
        'email',
        'phone',
        'photo',
        'aadhaar_copy',
        'previous_qualification',
        'last_marksheet',
        'transfer_certificate',
        'date_of_join'
    ];      
}
