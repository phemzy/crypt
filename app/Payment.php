<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function isConfirmed()
    {
    	return $this->status == 'successful';
    }

    public function isCancelled()
    {
    	return $this->status == 'cancelled';
    }

    public function cancel()
    {
    	$this->status = 'cancelled';
    	$this->save();
    }
}
