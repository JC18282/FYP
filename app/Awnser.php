<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Awnser extends Model
{
    public $timestamps = false;
    protected $fillable = ['question_id', 'body', 'correct'];

    public function question() {

    	return $this->belongsTo(Question::class);
    }
}
