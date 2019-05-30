<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function reserve()
	{
		return $this->hasMany(Reserve::class);
	}

}
