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
        $schedule->command('users:sendmail')->twiceDaily(8, 10);

        $schedule->command('admin:cardmail')->twiceDaily(8, 10);
        $schedule->command('admin:bmail')->twiceDaily(8, 10);
        $schedule->command('admin:amail')->twiceDaily(8, 10);

        $schedule->command('admin:fewamail')->twiceDaily(8, 10);
        $schedule->command('admin:electricitymail')->twiceDaily(8, 10);
        $schedule->command('admin:cmail')->twiceDaily(8, 10);

        $schedule->command('admin:seweragemail')->twiceDaily(8, 10);
        $schedule->command('admin:housemail')->twiceDaily(8, 10);
        $schedule->command('admin:watermail')->twiceDaily(8, 10);
        $schedule->command('admin:wifimail')->twiceDaily(8, 10);
        $schedule->command('test:test')->everyMinute();
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
