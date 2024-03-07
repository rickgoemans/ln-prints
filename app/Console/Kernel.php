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
    /** {@inheritdoc} */
    protected function schedule(Schedule $schedule): void
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

    /** {@inheritdoc} */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
