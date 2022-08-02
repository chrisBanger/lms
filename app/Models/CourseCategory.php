<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{    
	protected $table = 'course_category';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    public function categoryHasCourses()
    {
        return $this->hasMany('App\Models\Course', 'category_id','id');
    }
     public function categoryHasLimitedCourse()
    {
        return $this->hasMany('App\Models\Course', 'category_id','id')->latest()->take(4);
    }

}
