<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class QuestionType extends Model
{
    protected $table = 'question_types';

    public function question() {
        return $this->hasOne('App\Question');
    }
}
