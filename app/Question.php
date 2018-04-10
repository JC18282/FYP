<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    protected $fillable = ['quiz_id', 'question'];

    public function quiz() {

    	return $this->belongsTo(Quiz::class);
    }

    public function awnser() {

    	return $this->hasMany(Awnser::class);
    }


}
