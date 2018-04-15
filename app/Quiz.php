<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public $timestamps = false;
    protected $fillable = ['topic_id', 'title', 'description'];

    public function topic() {

    	return $this->belongsTo(Topic::class);

    }

    public function questions() {

    	return $this->hasMany(Question::class);

    }
}
