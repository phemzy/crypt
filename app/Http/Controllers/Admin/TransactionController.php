<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Market;
use Auth;

class TransactionController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function all($type)
    {
    	$t = Transaction::where('type', $type)->latest()->get();

    	return view('admin.transactions.all', [
    		'trans' => $t,
    		'type' => $type,
    	]);
    }

    public function status($type, $status)
    {
    	$trans = Transaction::where('type', $type)->where('status', $status)->get();
 
        return view('admin.transactions.status', compact('trans', 'status', 'type'));
    }

    public function matcher()
    {
        $tbc_buy = Transaction::where('status', 'pending')->where('market_id', 1)->where('type', 'purchase')->latest()->get();

        $tbc_sell = Transaction::where('status', 'pending')->where('market_id', 1)->where('type', 'sell')->latest()->get();

        $grc_buy = Transaction::where('status', 'pending')->where('market_id', 2)->where('type', 'purchase')->latest()->get();
        $grc_sell = Transaction::where('status', 'pending')->where('market_id', 2)->where('type', 'sell')->latest()->get();

        return view('admin.transactions.matcher', compact('grc_sell', 'grc_buy', 'tbc_sell', 'tbc_buy'));
    }

    public function multiMatcher()
    {
        $tbc_buy = Transaction::where('status', 'pending')->where('market_id', 1)->where('type', 'purchase')->latest()->get();

        $tbc_sell = Transaction::where('status', 'pending')->where('market_id', 1)->where('type', 'sell')->latest()->get();

        $grc_buy = Transaction::where('status', 'pending')->where('market_id', 2)->where('type', 'purchase')->latest()->get();
        $grc_sell = Transaction::where('status', 'pending')->where('market_id', 2)->where('type', 'sell')->latest()->get();

        return view('admin.transactions.multi_matcher', compact('grc_sell', 'grc_buy', 'tbc_sell', 'tbc_buy'));
    }

    public function match()
    {
        if(request('matching-type') == '1-1'){

            $buyer = Transaction::find(request('buyer'));
            $seller = Transaction::find(request('seller'));
            $p = $seller;
            $buy = $buyer;

            $p->update(['status'=>'matched', 'recipient_id'=>$buy->user_id]);
            $p->matched_transaction()->save($buy);
            $p->user->notify(new \App\Notifications\Matched($p));
            $buy->update(['status'=>'matched', 'recipient_id'=>$p->user_id]);
            $buy->matched_transaction()->save($p);
            $buy->user->notify(new \App\Notifications\Matched($buy));

            return back();

        }
        elseif (request('matching-type') == 'seller-2-1') {
            $buyer = Transaction::find(request('buyer'));
            $seller = Transaction::find(request('seller'));
            $ts = $seller->user->transactions()->where('status', 'pending')->get();

            $t = new Transaction();
            $t->market_id = $buyer->market_id;
            $t->package_id = $buyer->package_id;
            $t->recipient_id = $buyer->user->id;
            $t->transaction_id = $buyer->id;
            $t->status = 'matched';
            $t->type = 'sell';
            $t->user_id = $ts->first()->user->id;
            $t->save();

            $ts->each(function($item){
                $item->delete();
            });

            $buyer->update(['status'=>'matched', 'recipient_id'=>$t->user_id]);
            $buyer->transaction_id = $t->id;
            $buyer->save();
			$t->user->notify(new \App\Notifications\Matched($t));
			$buyer->user->notify(new \App\Notifications\Matched($buyer));

            return back();
        }
        elseif(request('matching-type') == 'buyer-2-1'){
            $buyers_id = collect(request('buyer'));
            $seller_id = collect(request('seller'));

            $seller = Transaction::find($seller_id->first());


            $buyer_one = Transaction::find($buyers_id->first());
            $buyer_two = Transaction::find($buyers_id->last());

            $t_one = new Transaction();
            $t_one->market_id = $buyer_one->market_id;
            $t_one->package_id = $buyer_one->package_id;
            $t_one->recipient_id = $buyer_one->user->id;
            $t_one->transaction_id = $buyer_one->id;
            $t_one->status = 'matched';
            $t_one->type = 'sell';
            $t_one->user_id = $seller->user->id;
            $t_one->save();

            $buyer_one->update(['status' => 'matched', 'recipient_id' => $t_one->user_id]);
            $buyer_one->transaction_id = $t_one->id;
            $buyer_one->save();

            $t_two = new Transaction();
            $t_two->market_id = $buyer_two->market_id;
            $t_two->package_id = $buyer_two->package_id;
            $t_two->recipient_id = $buyer_two->user->id;
            $t_two->transaction_id = $buyer_two->id;
            $t_two->status = 'matched';
            $t_two->type = 'sell';
            $t_two->user_id = $seller->user->id;
            $t_two->save();

            $buyer_two->update(['status' => 'matched', 'recipient_id' => $t_two->user_id]);
            $buyer_two->transaction_id = $t_two->id;
            $buyer_two->save();


            $seller->delete();

			$t_one->user->notify(new \App\Notifications\Matched($t_one));
			$t_two->user->notify(new \App\Notifications\Matched($t_two));
			$buyer_one->user->notify(new \App\Notifications\Matched($buyer_one));
			$buyer_two->user->notify(new \App\Notifications\Matched($buyer_two));

            return back();

        }
        else
            return back();
    }

}