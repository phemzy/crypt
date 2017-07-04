<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;
use Auth;
use App\Transaction;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('complete')->except(['next', 'postNext']);
    }
    public function next()
    {
        $markets = Market::all();

    	return view('profile.next')->withMarkets($markets);
    }

    public function postNext()
    {
    	$this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required',
            'city' => 'required'
        ]);

        Auth::user()->update([
            'first_name' => strip_tags(request('firstname')), 
            'last_name' => strip_tags(request('lastname')),
        ]);

        Auth::user()->profile()->update([
            'city' => strip_tags(request('city')),
            'number' => strip_tags(request('mobile'))
        ]);

        Auth::user()->completeProfile();

    	return 'true';
    }

    public function editProfile()
    {
    	return view('profile.edit');
    }

    public function updateProfile()
    {
    	$this->validate(request(), [

            'first_name' => 'required|alpha_dash',
            'last_name' => 'required|alpha_dash',
            'city' => 'required',
            'number' => 'required'

        ]);

        if(request('username') != Auth::user()->username){
            $this->validate(request(), ['username' => 'required|unique:users,username']);
        }
	if(request('pic')){
	Auth::user()->profile->profile_pic = request()->file('pic')->store('images', 'public');
}
      

        Auth::user()->update(request()->all());
        Auth::user()->profile->update(request()->all());

        session()->flash('success', 'Done!');

        return redirect()->back();
    }

    public function notifications()
    {
    	return view('profile.notifications');
    }

    public function getBankDetails()
    {
    	return view('profile.bank');
    }

    public function postBankDetails()
    {
    	$this->validate(request(), [

            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required'

        ]);

        Auth::user()->account->update(request()->all());

        session()->flash('success', 'Updated');

        return back();   
    }

    public function postTBCDetails()
    {
        $this->validate(request(), [

            'tbc_wallet_id' => 'required',

        ]);

        Auth::user()->profile->update(request()->all());

        session()->flash('success', 'Updated');

        return back();   
    }

    public function postGRCDetails()
    {
        $this->validate(request(), [

            'grc_email' => 'required',

        ]);

        Auth::user()->profile->update(request()->all());

        session()->flash('success', 'Updated');

        return back();   
    }
}