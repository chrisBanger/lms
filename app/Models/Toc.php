<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toc extends Model
{    
	protected $table = 'toc';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    public function tocBelongsToCourse()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function tocBelongsToParentTOC()
    {
        return $this->belongsTo(Toc::class,'parent_toc');
    }

    

}
