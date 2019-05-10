<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    public function rider()
    {
        return $this->belongsTo(Rider::class);
    }
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
}
