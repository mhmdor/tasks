<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'name',
        'user_id',
        'description',
        'done',
        'category_id'
    ];

    public function category()
    {
     return   $this->belongsTo(Category::class);
    }
}
