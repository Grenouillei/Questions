<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOptions extends Model
{
    use HasFactory;

    public function questions(){
        return $this->hasMany(Question::class,'id','question_id');
    }

    public function options(){
        return $this->hasMany(Option::class,'id','option_id');
    }
}
