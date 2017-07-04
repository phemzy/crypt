<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = ['package_id', 'loop', 'account_name', 'account_number', 'bank_name'];

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
