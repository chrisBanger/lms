<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Exam extends Model
{
	protected $table = 'exam';
     protected $guarded = [
        'id','created_at','updated_at'
    ];
    
     public function examBelongsToCourse()
    {
        return $this->belongsTo('App\Models\Course','course_id');
    }
    
   
}
