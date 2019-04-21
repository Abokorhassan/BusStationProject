<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    function user(){
        return $this->belongsTo('App\User');
    }
}
