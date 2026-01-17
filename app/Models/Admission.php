<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
        'application_id',
        'student_first_name',
        'student_last_name',
        'date_of_birth',
        'grade_applied',
        'parent_first_name',
        'parent_last_name',
        'email',
        'phone',
        'street',
        'city',
        'state',
        'zip',
        'status',
    ];
}
