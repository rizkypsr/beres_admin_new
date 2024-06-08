<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
=======
>>>>>>> 0943348 (initial commit)
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('tjs:truncate')->cron('0 0 1 1 *');
        $schedule->command('tpp:truncate')->cron('0 0 1 1 *');
        $schedule->command('transfer:truncate')->cron('0 0 1 1 *');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
