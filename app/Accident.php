<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }  
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }    
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
