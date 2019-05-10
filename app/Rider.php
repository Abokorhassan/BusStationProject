<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    public function reserve()
	{
		return $this->hasMany(Reserve::class);
	}
}
