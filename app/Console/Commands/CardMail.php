<?php

namespace App\Console\Commands;

use App\Models\Billdate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CardMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:cardmail';

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
        $gard_bill= Billdate::value('gard_bill');
        if ($today === $gard_bill) {

            $adminMail = User::where('role', 'admin')->select('email')->get();
            $emails = [];
            foreach ($adminMail as $mail) {
                $emails[] = $mail['email'];
            }
            Mail::send('adminemails.card', [], function ($message) use ($emails) {
                $message->to($emails)->subject('Have You Paid Card bill?');
            });

        }
    }
}
