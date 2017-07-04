<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }
}
