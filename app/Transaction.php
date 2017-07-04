<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'recipient_id', 'status', 'market_id'];
    //
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function market()
    {
    	return $this->belongsTo(Market::class);
    }

    public function package()
    {
    	return $this->belongsTo(Package::class);
    }

    public function recipient()
    {
    	$user = User::where('id', $this->recipient_id)->first();
        
    	return $user ?: null;
    }

    public function scopeSellable()
    {
        return $this->where('status', 'pending')->where('type', 'sell');
    }

    public function scopeBuyable()
    {
        return $this->where('status', 'pending')->where('type', 'purchase');
    }

    public function matched_transaction()
    {
        return $this->hasOne(Transaction::class, 'transaction_id');
    }

    public function isMatched()
    {
        return $this->status == 'matched' ? true : false;
    }

    public function hasFailed()
    {
        return $this->status == 'failed';
    }
}
