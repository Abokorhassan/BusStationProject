<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busstop extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
