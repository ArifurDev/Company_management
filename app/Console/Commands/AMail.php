<?php

namespace App\Console\Commands;

use App\Models\Billdate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:amail';

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
           $bil_a = $bil->a;//select colum in database
           $ago = $bil_a-1;// decremrnt 1

            if ($bil_a == $today) {
                       $adminMail = User::where('role', 'admin')->select('email')->get();
                        $emails = [];
                        foreach ($adminMail as $mail) {
                            $emails[] = $mail['email'];
                        }
                        Mail::send('adminemails.a', [], function ($message) use ($emails) {
                            $message->to($emails)->subject('Have You Paid A bill?');
                        });

            }elseif ($ago == $today) {
                        $adminMail = User::where('role', 'admin')->select('email')->get();
                        $emails = [];
                        foreach ($adminMail as $mail) {
                            $emails[] = $mail['email'];
                        }
                        Mail::send('adminemails.a', [], function ($message) use ($emails) {
                            $message->to($emails)->subject('Have You Paid A bill?');
                        });
            }
         }





        //old code


        // $today = now()->format('d');
        // $a= Billdate::value('a');

        // $b = $a-1;

        // if ($today == $a) {

        //    $adminMail = User::where('role', 'admin')->select('email')->get();
        //    $emails = [];
        //    foreach ($adminMail as $mail) {
        //        $emails[] = $mail['email'];
        //    }
        //    Mail::send('adminemails.a', [], function ($message) use ($emails) {
        //        $message->to($emails)->subject('Have You Paid A bill?');
        //    });

        // }elseif ($today == $b) {
        //         $adminMail = User::where('role', 'admin')->select('email')->get();
        //    $emails = [];
        //    foreach ($adminMail as $mail) {
        //        $emails[] = $mail['email'];
        //    }
        //    Mail::send('adminemails.a', [], function ($message) use ($emails) {
        //        $message->to($emails)->subject('Have You Paid A bill?');
        //    });
        // }




    }
}
