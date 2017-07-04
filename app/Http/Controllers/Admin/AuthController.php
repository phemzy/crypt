<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
    	return view('admin/auth/login');
    }

    public function login()
    {
    	$this->validate(request(), [
    		'email' => 'required',
    		'password' => 'required'
    	]);

    	$credentials = request()->only(['email', 'password']);


    	if(\Auth::guard('admin')->attempt($credentials))
    	{
    		return redirect()->route('admin.dashboard');
    	}
    	else
    		return 'false';
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return redirect()->route('admin.login.show');
    }
}
