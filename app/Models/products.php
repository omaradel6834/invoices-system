<?php
namespace App\Models;
use App\Models\sections;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $guarded = [];


  

    public function section()
    {
       return $this->belongsTo('App\Models\sections');
    }
    
}
