<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
	protected $fillable = ['user_id', 'transaction_id', 'testimony'];
    //
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function transaction()
    {
    	return $this->belongsTo(Transaction::class);
    }
}
