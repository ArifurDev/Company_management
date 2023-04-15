<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail to all user by runing this command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        

        $adminMail = User::where('role', 'admin')->select('email')->get();
        $emails = [];
        foreach ($adminMail as $mail) {
            $emails[] = $mail['email'];
        }
        Mail::send('adminemails.empolyee', [], function ($message) use ($emails) {
            $message->to($emails)->subject('Have You Paid Your Employees?');
        });
    }
}
