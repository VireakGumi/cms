<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'photo',
        'category_id',
        // 'user_id'
    ];

    // relationship
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    // public function user() {
    //     return $this->belongsTo(User::class,'user_id');
    // }
}
