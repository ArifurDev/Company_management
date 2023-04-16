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
        $schedule->command('users:sendmail')->cron('* * * * *');
        // $schedule->command('users:sendmail')->twiceDaily(10, 12);
        $schedule->command('admin:cardmail')->cron('* * * * *');
        $schedule->command('admin:bmail')->cron('* * * * *');
        $schedule->command('admin:amail')->cron('* * * * *');

        $schedule->command('admin:fewamail')->cron('* * * * *');
        $schedule->command('admin:electricitymail')->cron('* * * * *');
        $schedule->command('admin:cmail')->cron('* * * * *');

        $schedule->command('admin:seweragemail')->cron('* * * * *');
        $schedule->command('admin:housemail')->cron('* * * * *');
        $schedule->command('admin:watermail')->cron('* * * * *');
        $schedule->command('admin:wifimail')->cron('* * * * *');
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
