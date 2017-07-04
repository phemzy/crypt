<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authify extends Model
{
    //
	protected $fillable = ['login_id', 'provider'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
