<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MatchUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'match:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Match all pending transactions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $sell = \App\Transaction::sellable();
        $buy = \App\Transaction::buyable();

        if($sell){
            $sell->get()->map(function($p){
            $buy = \App\Transaction::buyable()->where('market_id', $p->market_id)->where('package_id', $p->package_id)->first();
            if($buy){
                $p->update(['status'=>'matched', 'recipient_id'=>$buy->user_id]);
                $p->matched_transaction()->save($buy);
                $p->user->notify(new \App\Notifications\Matched($p));
                $buy->update(['status'=>'matched', 'recipient_id'=>$p->user_id]);
                $buy->matched_transaction()->save($p);
                $buy->user->notify(new \App\Notifications\Matched($buy));
                $this->info('Done');
                return;
            }
            else
                $this->error('Nothing to match.');
        });
        } else
            $this->error('No transactions at all');
    }
}
