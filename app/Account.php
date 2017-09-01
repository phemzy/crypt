<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function package()
    {
    	return $this->belongsTo(Package::class);
    }

    public function market()
    {
        return $this->belongsTo(Market::class);
    }
}
