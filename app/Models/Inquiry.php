<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Inquiry extends Model
{
	protected $table = 'inquiry';
    protected $fillable = [
       'fname',  'lname', 'email','subject','message','is_read','is_active','is_deleted',
        
    ];
    
    
   
}
