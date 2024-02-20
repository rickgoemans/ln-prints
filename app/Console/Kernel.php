<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Laravel\Horizon\Console\SnapshotCommand;
use Laravel\Telescope\Console\PruneCommand;
use Spatie\Backup\Commands\BackupCommand;
use Spatie\Backup\Commands\CleanupCommand;

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
        /* TELESCOPE */
        $schedule->command(PruneCommand::class, [
            '--hours=48',
        ])->dailyAt('01.30');

        /* BACKUP */
        $schedule->command(BackupCommand::class, [
            '--only-db',
        ])->dailyAt('02:00');

        $schedule->command(CleanupCommand::class)
            ->dailyAt('02:30');

        /* HORIZON */
        $schedule->command(SnapshotCommand::class)
            ->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
