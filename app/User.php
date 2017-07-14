<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name', 'affiliate_id', 'referred_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['markets'];

    public function testimonies()
    {
        return $this->hasMany(Testimony::class);
    }

    public function hasCompletedProfile()
    {
        return (bool) $this->complete == true;
    }

    public function isBlocked()
    {
        return $this->blocked == true;
    }

    public function block()
    {
        $this->blocked = true;
        $this->save();
    }

    public function unblock()
    {
        $this->blocked = false;
        $this->save();
    }

    public function completeProfile()
    {
        $this->complete = true;
        $this->save();

        return true;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function markets()
    {
        return $this->belongsToMany(Market::class);
    }

    public function getMarketsAttribute()
    {
        return $this->markets()->get();
    }

    public function fullname(){
        $name = $this->first_name . ' ' . $this->last_name;

        return $name != ' ' ? $name : $this->username;
    }

    public function hasjoined(\App\Market $market)
    {
        return (bool) in_array($market->id, $this->markets()->pluck('market_id')->toArray());
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function logins()
    {
        return $this->hasMany(Authify::class);
    }

    public function hasEmptyTransactions()
    {
        return $this->transactions->count() != 0 ? false : true;
    }

    public function hasTransactions()
    {
        return (bool) $this->transactions->count();
    }
}