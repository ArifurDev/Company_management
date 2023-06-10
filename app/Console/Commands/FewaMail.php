<?php

namespace App\Console\Commands;

use App\Models\Billdate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class FewaMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:fewamail';

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
        $fewa_bill= Billdate::value('fewa_bill');

        $b = $fewa_bill-1;

        if ($today == $fewa_bill) {

            $adminMail = User::where('role', 'admin')->select('email')->get();
            $emails = [];
            foreach ($adminMail as $mail) {
                $emails[] = $mail['email'];
            }
            Mail::send('adminemails.fewa', [], function ($message) use ($emails) {
                $message->to($emails)->subject('Have You Paid fewa bill?');
            });

        }elseif ($today == $b) {
                 $adminMail = User::where('role', 'admin')->select('email')->get();
            $emails = [];
            foreach ($adminMail as $mail) {
                $emails[] = $mail['email'];
            }
            Mail::send('adminemails.a', [], function ($message) use ($emails) {
                $message->to($emails)->subject('Have You Paid fewa bill?');
            });
         }
    }
}
