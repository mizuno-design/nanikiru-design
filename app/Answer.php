<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Answer extends Model
{
    //
    public function question() {
        return $this->belongsTo('App\Question');
    }
}
