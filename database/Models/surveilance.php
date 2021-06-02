<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveilance extends Model
{
    use HasFactory;

    public function surveilance() {
    	return $this->belongsTo(agencies::class);
    }    
}
