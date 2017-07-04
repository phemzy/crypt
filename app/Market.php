<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    //
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }
}
