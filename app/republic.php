<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class republic extends Model
{
    public function user()  {
        return $this->belongsTo('App\User');
    }
}
