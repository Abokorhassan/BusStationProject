<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function bus()
	{
		return $this->hasOne(Bus::class);
	}
	public function user()
    {
        return $this->belongsTo(User::class);
	}
	public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function accident()
	{
		return $this->hasMany(Accident::class);
	}
}
