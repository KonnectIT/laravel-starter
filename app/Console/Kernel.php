<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Clean-up things
        $schedule->command('cache:clear')->daily()->at('00:00');
        $schedule->command('config:cache')->daily()->at('00:00');
        $schedule->command('route:cache')->daily()->at('00:00');
        $schedule->command('activitylog:clean')->daily()->at('00:00');
        $schedule->command('debugbar:clear')->daily()->at('00:00');
        $schedule->command('auth:clear-resets')->daily()->at('00:00');
        $schedule->command('env:sync')->daily()->at('00:00');

        // Running backup
        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('02:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
