<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
