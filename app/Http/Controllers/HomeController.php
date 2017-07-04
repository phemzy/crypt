<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;
use App\Subscriber;
use App\Message;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'complete'])->except(['subscribe', 'postContact']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = Auth::user()->markets()->get();

        $transactions = request()->user()->transactions()->latest()->paginate('10');
        
        return view('home', [
            'user_markets' => $markets,
            'transactions' => $transactions,
        ]);
    }

    public function subscribe()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:subscribers,email'
        ]);

        Subscriber::create(request()->all());

        session()->flash('success', 'Subscribed');

        return back();
    }

    public function postContact()
    {
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'subject' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]); 

        Message::create(request()->all());

        session()->flash('success', 'Message sent. Thanks for contacting us.');

        return back();
    }
}
