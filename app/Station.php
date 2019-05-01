<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function bus()
	{
		return $this->hasMany(Bus::class);
	}
}
