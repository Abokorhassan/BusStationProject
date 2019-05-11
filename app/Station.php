<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function bus()
	{
		return $this->hasMany(Bus::class);
	}
	public function reserve()
	{
		return $this->hasMany(Reserve::class);
	}
	public function rider()
	{
		return $this->hasMany(Rider::class);
	}
	public function driver()
	{
		return $this->hasMany(Rider::class);
	}
}
