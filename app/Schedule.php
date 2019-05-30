<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function queue()
	{
		return $this->hasMany(Queue::class);
    }
    public function reserve()
	{
		return $this->hasMany(Reserve::class);
	}
}
