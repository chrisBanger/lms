<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{    
	protected $table = 'course';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    public function courseBelongsToCategory()
    {
        return $this->belongsTo('App\Models\CourseCategory','category_id');
    }
    public function courseBelongsToInstructor()
    {
        return $this->belongsTo('App\Models\User','teacher_id');
    }
    public function courseBelongsToState()
    {
        return $this->belongsTo('App\Models\State','state_id');
    }
    public function CoursehasManyToc()
    {
    return $this->hasMany(Toc::class,'course_id','id');
    }

    public function CoursehasManyExam()
    {
    return $this->hasMany(Exam::class,'course_id','id');
    }

}
