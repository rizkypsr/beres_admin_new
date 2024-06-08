<?php

namespace App\Console\Commands;

<<<<<<< HEAD
use Illuminate\Console\Command;
use Carbon\Carbon;
=======
use Carbon\Carbon;
use Illuminate\Console\Command;
>>>>>>> 0943348 (initial commit)

class transaksijs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:tjs';

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
<<<<<<< HEAD
            transaksijs::where('created_at', '<', Carbon::now())->each(function ($tjs) {
=======
        transaksijs::where('created_at', '<', Carbon::now())->each(function ($tjs) {
>>>>>>> 0943348 (initial commit)
            $tjs->delete();
        });
        // return 0;
    }
}
