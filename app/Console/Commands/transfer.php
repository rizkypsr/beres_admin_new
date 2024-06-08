<?php

namespace App\Console\Commands;

<<<<<<< HEAD
use Illuminate\Console\Command;
use Carbon\Carbon;
=======
use Carbon\Carbon;
use Illuminate\Console\Command;
>>>>>>> 0943348 (initial commit)

class transfer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:transfer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        transfer::where('created_at', '<', Carbon::now())->each(function ($transfer) {
            $transfer->delete();
        });
    }
}
