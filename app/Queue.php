<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class Queue extends Model
{

    use SoftDeletes; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
