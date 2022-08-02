<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{    
	protected $table = 'quiz';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    public function quizBelongsToCourse()
    {
        return $this->belongsTo('App\Models\Course','course_id');
    }

    public function quizBelongsToUser()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    // public function categoryHasCourses()
    // {
    //     return $this->hasMany('App\Models\Course', 'category_id','id');
    // }
    //  public function categoryHasLimitedCourse()
    // {
    //     return $this->hasMany('App\Models\Course', 'category_id','id')->latest()->take(4);
    // }

}
