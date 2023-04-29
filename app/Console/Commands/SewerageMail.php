<?php

namespace App\Console\Commands;

use App\Models\Billdate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SewerageMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:seweragemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail to all admin by runing this command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = now()->format('d');
        $sewerage_bill= Billdate::value('sewerage_bill');
        if ($today === $sewerage_bill) {

            $adminMail = User::where('role', 'admin')->select('email')->get();
            $emails = [];
            foreach ($adminMail as $mail) {
                $emails[] = $mail['email'];
            }
            Mail::send('adminemails.sewerage', [], function ($message) use ($emails) {
                $message->to($emails)->subject('Have You Paid sewerage bill?');
            });

        }
    }
}
