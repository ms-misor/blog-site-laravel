<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher_educations'; // Specify the table name

    
}