<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content'];

    public function quiz() {

    	return $this->hasOne(Quiz::class);

    }
}
