<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;

class Question extends Model
{
    //
    protected $table = 'questions';

    public function answer() {
        return $this->hasOne('App\Answer');
    }
}
