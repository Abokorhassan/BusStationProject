<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'Driver_id');
    }

    public function reserve()
	{
		return $this->hasMany(Reserve::class);
    }
    
    public function rider()
	{
		return $this->hasMany(Rider::class);
    }
    public function queue()
	{
		return $this->hasOne(Queue::class);
    }
    public function seat()
	{
		return $this->hasMany(Seat::class);
    }
    
}
