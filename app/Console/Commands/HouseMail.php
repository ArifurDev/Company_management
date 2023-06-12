<?php

namespace App\Console\Commands;

use App\Models\Billdate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class HouseMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:housemail';

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
                   $bil_house = $bil->house_rent;//select colum in database
                   $ago = $bil_house-1;// decremrnt 1

                    if ($bil_house == $today) {
                               $adminMail = User::where('role', 'admin')->select('email')->get();
                                $emails = [];
                                foreach ($adminMail as $mail) {
                                    $emails[] = $mail['email'];
                                }
                                Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                    $message->to($emails)->subject('Have You Paid House Rent?');
                                });

                    }elseif ($ago == $today) {
                                $adminMail = User::where('role', 'admin')->select('email')->get();
                                $emails = [];
                                foreach ($adminMail as $mail) {
                                    $emails[] = $mail['email'];
                                }
                                Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                    $message->to($emails)->subject('Have You Paid House Rent?');
                                });
                    }
                 }


        // $today = now()->format('d');
        // $house_rent= Billdate::value('house_rent');

        // $b = $house_rent-1;

        // if ($today == $house_rent) {

        //     $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.hous', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid House rent?');
        //     });

        // }elseif ($today == $b) {
        //          $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.a', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid House rent?');
        //     });
        //  }
    }
}
