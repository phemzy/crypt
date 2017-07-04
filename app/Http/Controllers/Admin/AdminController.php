<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use App\Subscriber;
use App\Admin;
use App\Package;
use App\Mail\NotMakingMoneyYet;
use Mail;
use Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function dashboard()
    {
    	return view('admin.dashboard', [
    		'trans' => Transaction::all(),
    		'users' => User::all(),
    		'sub' => Subscriber::all(),
    		'admins' => Admin::all(),
            'packages' => Package::all(),
    	]);
    }

    public function allUsers($type = 'all')
    {
        if($type == 'all'){
            $users =  User::paginate(100);
        }elseif($type == 'blocked'){
            $users = User::where('blocked', true)->paginate(100);
        }elseif($type == 'inactive'){
            $users = User::where('empty_transaction', 'true')->paginate(100);
        }else
            $users = User::where('complete', false)->paginate(100);

        
        return view('admin.users.all', [
            'users' => $users,
            'inactive' => User::where('empty_transaction', 'true')->get(),
            'type' => $type,
        ]);
    }


    public function blockuser(User $user)
    {
        if($user->isBlocked()){
            $user->unblock();
            return back();
        }

        $user->block();

        return back();
    }

    public function clear()
    {
        User::all()->map(function($p){
            if($p->hasEmptyTransactions()){
                $p->empty_transaction = true;
                $p->save();
            }else{
                $p->empty_transaction = false;
                $p->save();
            }
        });
    }

    public function mailInactiveUsers()
    {
        return view('admin.users.inactive_mail_form');
    }

    public function mailInactiveUsersSend()
    {
        $users = User::where('empty_transaction', true)->get();
        $users->map(function($u){
            Mail::to($u)->send(new NotMakingMoneyYet($u, request()));
        });

        Mail::to(Auth::guard('admin')->user())->send(new NotMakingMoneyYet(Auth::guard('admin')->user(), request()));
        
    }
}