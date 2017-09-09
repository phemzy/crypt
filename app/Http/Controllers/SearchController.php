<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function search()
    {
    	$search = request('search');

    	$users = User::where(\DB::raw('CONCAT(first_name, last_name)'), 'LIKE', "%{$search}%")->orWhere('username', "LIKE", "%{$search}%")->get();

    	return view('search.index')->withUsers($users);
    }
}
