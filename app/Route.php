<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function schedule()
	{
		return $this->hasMany(Schedule::class);
    }
}
