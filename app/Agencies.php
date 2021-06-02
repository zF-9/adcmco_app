<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencies extends Model
{
    public function agencies() {
        return $this->hasMany(active::class);
        return $this->hasMany(surveilance::class);
    }
}
