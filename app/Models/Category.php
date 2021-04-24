<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',        
    ];
    protected $fillable=['categoryName','categoryIcon'];
    protected $appends = ['count'];

    public function getCountAttribute()
    {
       return "Intialize Error"; //$this->files;//->count();  
    }

    public function files(){
    	return $this->hasMany(File::class);
    }
}
