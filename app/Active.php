<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    public function active() {
    	return $this->belongsTo(agencies::class);
    }   
}
