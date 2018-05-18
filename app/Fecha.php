<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{


      protected $fillable = [
        'user_id', 'log_in',
    ];

    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
   
}
