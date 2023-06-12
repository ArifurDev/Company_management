<?php

namespace App\Console\Commands;

use App\Models\Billdate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ElectricityMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:electricitymail';

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
                   $bil_electricity = $bil->electricity_bill;//select colum in database
                   $ago = $bil_electricity-1;// decremrnt 1

                    if ($bil_electricity == $today) {
                               $adminMail = User::where('role', 'admin')->select('email')->get();
                                $emails = [];
                                foreach ($adminMail as $mail) {
                                    $emails[] = $mail['email'];
                                }
                                Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                $message->to($emails)->subject('Have You Paid electricity bill?');
                                });

                    }elseif ($ago == $today) {
                                $adminMail = User::where('role', 'admin')->select('email')->get();
                                $emails = [];
                                foreach ($adminMail as $mail) {
                                    $emails[] = $mail['email'];
                                }
                                Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                $message->to($emails)->subject('Have You Paid electricity bill?');
                            });
                    }
                 }


        // $today = now()->format('d');
        // $electricity_bill= Billdate::value('electricity_bill');

        // $b = $electricity_bill-1;

        // if ($today == $electricity_bill) {

        //     $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.electricity', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid electricity bill?');
        //     });

        // }elseif ($today == $b) {
        //          $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.a', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid electricity bill?');
        //     });
        //  }
    }
}
