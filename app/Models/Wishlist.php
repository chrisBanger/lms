<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Wishlist extends Model
{
	protected $table = 'wishlist';
    protected $fillable = [
        'user_id','crawl_id','keyword_id','crawl_url', 'result_description','is_deleted'
    ];
    
     public function wishlistBelongsTo()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
   
}
