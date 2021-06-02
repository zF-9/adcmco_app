<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agencies extends Model
{
    use HasFactory;

    public function agencies() {
        return $this->hasMany(active::class);
        return $this->hasMany(surveilance::class);
    }

}
