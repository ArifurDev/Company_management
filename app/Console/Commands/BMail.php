<?php

namespace App\Console\Commands;

use App\Models\Billdate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:bmail';

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
                //new code

                $bill =  Billdate::all();
                $today = now()->format('d');

                 foreach ($bill as $bil) {
                   $bil_b = $bil->b;//select colum in database
                   $ago = $bil_b-1;// decremrnt 1

                    if ($bil_b == $today) {
                            $adminMail = User::where('role', 'admin')->select('email')->get();
                            $emails = [];
                            foreach ($adminMail as $mail) {
                                $emails[] = $mail['email'];
                            }
                            Mail::send('adminemails.b', [], function ($message) use ($emails) {
                                $message->to($emails)->subject('Have You Paid B bill?');
                            });

                    }elseif ($ago == $today) {
                           $adminMail = User::where('role', 'admin')->select('email')->get();
                            $emails = [];
                            foreach ($adminMail as $mail) {
                                $emails[] = $mail['email'];
                            }
                            Mail::send('adminemails.b', [], function ($message) use ($emails) {
                                $message->to($emails)->subject('Have You Paid B bill?');
                            });
                    }
                 }



        // $today = now()->format('d');
        // $b= Billdate::value('b');

        // $a = $b-1;

        // if ($today == $b) {

        //     $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.b', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid B bill?');
        //     });

        //  }elseif ($today == $a) {
        //          $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.a', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid A bill?');
        //     });
        //  }

    }
}
