<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_code';
    public $incrementing = false;
    protected $keyType = 'string';

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_courses', 'course_code', 'user_id');
    }

    // app/Models/Course.php
    public function videos()
    {
        return $this->hasMany(Video::class, 'course_code', 'course_code');
    }

    public function pdfs()
    {
        return $this->hasMany(Pdf::class, 'course_code', 'course_code');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'course_code', 'course_code');

    }
}


