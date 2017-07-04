<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $fillable = ['city', 'number', 'tbc_wallet_id', 'grc_email'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
