<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WinResultService;

class WinResultPayout extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WinResultPayout';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Win result payout based on setting';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        (new WinResultService())->winPayout();
    }

}
