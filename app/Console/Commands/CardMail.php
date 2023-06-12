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

                //new code

                $bill =  Billdate::all();
                $today = now()->format('d');

                 foreach ($bill as $bil) {
                   $bil_card = $bil->gard_bill;//select colum in database
                   $ago = $bil_card-1;// decremrnt 1

                    if ($bil_card == $today) {
                               $adminMail = User::where('role', 'admin')->select('email')->get();
                                $emails = [];
                                foreach ($adminMail as $mail) {
                                    $emails[] = $mail['email'];
                                }
                                Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                    $message->to($emails)->subject('Have You Paid Card bill?');
                                });

                    }elseif ($ago == $today) {
                                $adminMail = User::where('role', 'admin')->select('email')->get();
                                $emails = [];
                                foreach ($adminMail as $mail) {
                                    $emails[] = $mail['email'];
                                }
                                Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                    $message->to($emails)->subject('Have You Paid Card bill?');
                                });
                    }
                 }


        // $today = now()->format('d');
        // $gard_bill= Billdate::value('gard_bill');

        // $b = $gard_bill-1;

        // if ($today == $gard_bill) {

        //     $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.card', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid Card bill?');
        //     });

        // }elseif ($today == $b) {
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
