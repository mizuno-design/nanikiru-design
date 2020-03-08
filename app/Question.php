<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use App\QuestionType;

class Question extends Model
{
    protected $table = 'questions';

    public function answer() {
        return $this->hasOne('App\Answer');
    }

    public function question_type() {
        return $this->belongsTo('App\QuestionType');
    }
}
