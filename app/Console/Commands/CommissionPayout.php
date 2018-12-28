<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CommissionPayoutService;

class CommissionPayout extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CommissionPayout';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commission payout based on setting';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
         (new CommissionPayoutService())->commPayout();
       /* $id = 4;
        $startDate = '';
        $endDate = '';
        $gameId = '';
        (new CommissionPayoutService())->commPayoutDetails($id, $startDate, $endDate, $gameId);
        *
        */


        //(new WinResultService())->winPayout();
    }

}
