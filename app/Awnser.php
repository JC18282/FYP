<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Awnser extends Model
{
    public $timestamps = false;

    public function question() {

    	//$return $this->belongsTo(Question::class);
    }
}
