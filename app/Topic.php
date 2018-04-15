<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'content', 'image'];

    public function quiz() {

    	return $this->hasOne(Quiz::class);

    }
}
