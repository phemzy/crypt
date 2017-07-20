<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function recipient()
    {
    	return $this->belongsTo(User::class, 'recipient_id');
    }

    public function isActive(){
    	return (bool) $this->active == true;
    }

    public function isClaimed()
    {
    	return (bool) $this->claimed == true;
    }

    public function isNotClaimed()
    {
    	return (bool) $this->claimed == false;
    }
}
