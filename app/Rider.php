<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    public function reserve()
	{
		return $this->hasMany(Reserve::class);
	}

	public function station()
    {
        return $this->belongsTo(Station::class);
	}
	
	public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
