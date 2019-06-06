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
		return $this->hasMany(Driver::class);
	}
	public function busstop()
	{
		return $this->hasMany(Busstop::class);
	}
	public function accident()
	{
		return $this->hasMany(Accident::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function schedule()
	{
		return $this->hasMany(Schedule::class);
	}
	public function queue()
	{
		return $this->hasMany(Queue::class);
	}
}
