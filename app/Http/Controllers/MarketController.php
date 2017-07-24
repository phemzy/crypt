<?php

namespace App\Http\Controllers;

use App\Notifications\VoucherGenerated;
use App\Voucher;
use Illuminate\Http\Request;
use App\Market;
use App\Package;
use App\Transaction;
use Auth;
use PDF;

class MarketController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('complete')->except(['join']);
    }

    public function buy($market)
    {
        // $t = Transaction::where('user_id', Auth::id())->where('type', 'purchase')->where('status', 'pending')->first();

        // if($t){
        //     session()->flash('error', 'You bought ' . $t->market->abbr_name . ' worth ' . $t->package->amount . ' and it is ' . $t->status. '. Kindly complete it first.');

        //     return back();
        // }

    	$m = Market::where('abbr_name', $market)->first();

    	return view('market.market', [
    		'market' => $m,
    		'packages' => Package::oldest()->where('name', '!=', 'Beginner')->get(),
    	]);
    }

    public function sell($market)
    {
    	$m = Auth::user()->account->market;

    	return view('market.sell', [
    		'market' => $m,
    		'a' => request()->user()->account->load('package'),
    	]);
    }

    public function join(Market $market)
    {
    	request()->user()->markets()->toggle($market);
    	
    	return request()->user()->hasJoined($market) ? response()->json('true') : response()->json('false');
    }

    public function jsonMarkets()
    {
    	return Market::all();
    }

    public function marketInterest()
    {
    	return view('market.interest')->withMarkets(Market::all());
    }

    public function buyCrypto(Market $market, Package $package)
    {
        if(!$market || !$package){
            session()->flash('error', 'Something went wrong. Please try again');
            return back();
        }

        if(Auth::user()->account->loop != 0){
            session()->flash('error', 'You still have some ' . Auth::user()->account->market->abbr_name . ' to sell. Please sell them first.');

            return back();
        }

        // $t = Transaction::where('user_id', Auth::id())->where('type', 'purchase')->where('status', '!=', 'complete')->first();

        // if($t){
        //     session()->flash('error', 'You bought ' . $t->market->abbr_name . ' worth ' . $t->package->amount . ' and it is ' . $t->status. '. Kindly complete it first.');

        //     return redirect()->route('transaction.single', $t->id);
        // }

    	$t = new Transaction;

    	$t->package_id = $package->id;
    	$t->market_id = $market->id;
    	$t->status = 'pending';
    	$t->type = 'purchase';

    	request()->user()->transactions()->save($t); 

        session()->flash('success', 'Successful');   	

    	return view('market.transaction_buy', compact('t'));
    	
    }

    public function sellCrypto(Market $market)
    {
    	$user = request()->user();

    	if(($user->account->loop == 1 || $user->account->loop == 2 ) && $user->account->package !== null){

    		$t = new Transaction;
	    	
	    	$t->package_id = $user->account->package_id;
	    	$t->market_id = $market->id;
	    	$t->status = 'pending';
	    	$t->type = 'sell';

	    	request()->user()->transactions()->save($t);

	    	$user->account->loop -= 1; 

	    	$user->account->save();

            session()->flash('success', 'Transaction received');   	

	    	return view('market.transaction_sell', compact('t'));
    	}

        session()->flash("error", 'An error occurred!');

    	return back();
    
    }

    public function confirmPayment(Transaction $t)
    {
    	$sold_item = $t;
    	$bought_item = $t->matched_transaction;

    	$seller = $t->user;
    	$buyer = $t->matched_transaction->user;

    	$buyer->account()->update(['package_id' => $bought_item->package_id, 'loop' => 2]);

    	$sold_item->update(['status' => 'complete']);
    	$bought_item->update(['status' => 'complete']);

    	$buyer->account()->update(['package_id' => $bought_item->package_id, 'market_id' => $bought_item->market_id]);

        session()->flash('success', 'Confirmed');

    	return back();
    }

    public function uploadProof($t)
    {
        $trans = Transaction::find($t);

        if(!$trans){
            return back();
        }


        $trans->proof_of_payment = request('proof')->store('proofs', 'public');
        $trans->save();

        session()->flash('success', 'Uploaded');
        return back();

    }

    public function viewSingletransaction(Transaction $t)
    {
        if(Auth::id() != $t->user->id){
            session()->flash('error', 'Error');
            return redirect()->route('home');
        }
    	if($t->type == 'purchase'){
    		return view('market.transaction_buy', compact('t'));
    	}

    	return view('market.transaction_sell', compact('t'));
    }

    public function getAllHistory()
    {
        $transactions = request()->user()->transactions()->latest()->paginate('10');

        return view('history.all', compact('transactions'));
    }
    
    public function getBuyingHistory()
    {
    	$transactions = request()->user()->transactions()->where('type', 'purchase')->latest()->paginate('10');
    	return view('history.buy', compact('transactions'));
    }
    
    public function getSellingHistory()
    {
    	$transactions = request()->user()->transactions()->where('type', 'sell')->latest()->paginate('10');
    	return view('history.sell', compact('transactions'));
    }

    public function convertToVoucher(Transaction $transaction)
    {
        $v = new Voucher;
        $v->name = "JULY-" . str_random(5) . '-SALES-' . random_int(1, 1000);
        $v->amount = $transaction->package->amount;
        $v->user_id = auth()->id();
        $v->save();

        $transaction->delete();

        auth()->user()->notify(new VoucherGenerated(auth()->user(), $v));

        session()->flash('success', 'Your voucher has been sent to your mail.');

        return back();
    }

    public function generateInvoice()
    {
        if(!auth()->user()->hasPaid()){
            session()->flash('error', 'Sorry, you are not qualified');

            return redirect('/home');
        }
        $pdf = PDF::loadView('pdf');
        return $pdf->download('pdf.pdf');
    }
}
