<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'correct',
        'category_id',
        'level_id',
    ];

    public function level(){
        return $this->hasOne(Level::class,'id','level_id');
    }

    public function correct(){
        return $this->hasOne(Option::class,'id','correct');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function options(){
        return $this->belongsToMany(Option::class,'question_options');
    }
}
