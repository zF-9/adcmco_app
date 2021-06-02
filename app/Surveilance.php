<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surveilance extends Model
{
    public function surveilance() {
    	return $this->belongsTo(agencies::class);
    }  
}
