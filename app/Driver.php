<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function bus()
	{
		return $this->hasOne(Bus::class);
	}
}
