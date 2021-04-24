<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['file','filename','category_id','thumbnail'];
    protected $with = ['category'];
    protected $casts = [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',        
    ];
    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
