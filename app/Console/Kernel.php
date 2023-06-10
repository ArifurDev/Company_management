<?php

namespace App\Console;

use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\SendMail::class,
        Commands\HouseMail::class,
        Commands\ElectricityMail::class,
        Commands\WaterMail::class,
        Commands\WifiMail::class,
        Commands\SewerageMail::class,
        Commands\FewaMail::class,
        Commands\CardMail::class,
        Commands\AMail::class,
        Commands\BMail::class,
        Commands\CMail::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('users:sendmail')->cron('0 8 * * *');

        $schedule->command('admin:cardmail')->cron('0 8 * * *');
        $schedule->command('admin:bmail')->cron('0 8 * * *');
        // $schedule->command('admin:amail')->dailyAt('08:00');

        $schedule->command('admin:amail')->cron('0 8 * * *');

        $schedule->command('admin:fewamail')->cron('0 8 * * *');
        $schedule->command('admin:electricitymail')->cron('0 8 * * *');
        $schedule->command('admin:cmail')->cron('0 8 * * *');

        $schedule->command('admin:seweragemail')->cron('0 8 * * *');
        $schedule->command('admin:housemail')->cron('0 8 * * *');
        $schedule->command('admin:watermail')->cron('0 8 * * *');
        $schedule->command('admin:wifimail')->cron('0 8 * * *');
        $schedule->command('test:test')->cron('0 8 * * *');
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
