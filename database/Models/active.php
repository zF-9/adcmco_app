<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class active extends Model
{
    use HasFactory;

    public function active() {
    	return $this->belongsTo(agencies::class);
    }    
}
