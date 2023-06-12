<?php

namespace App\Console\Commands;

use App\Models\Billdate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:cmail';

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
                   $bil_c = $bil->c;//select colum in database
                   $ago = $bil_c-1;// decremrnt 1

                    if ($bil_c == $today) {
                               $adminMail = User::where('role', 'admin')->select('email')->get();
                                $emails = [];
                                foreach ($adminMail as $mail) {
                                    $emails[] = $mail['email'];
                                }
                                Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                    $message->to($emails)->subject('Have You Paid C bill?');
                                });

                    }elseif ($ago == $today) {
                                $adminMail = User::where('role', 'admin')->select('email')->get();
                                $emails = [];
                                foreach ($adminMail as $mail) {
                                    $emails[] = $mail['email'];
                                }
                                Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                    $message->to($emails)->subject('Have You Paid C bill?');
                                });
                    }
                 }



        // $today = now()->format('d');
        // $c= Billdate::value('c');

        // $b = $c-1;

        // if ($today == $c) {

        //     $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.c', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid C bill?');
        //     });

        // }elseif ($today == $b) {
        //          $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.a', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid C bill?');
        //     });
        //  }
    }
}
