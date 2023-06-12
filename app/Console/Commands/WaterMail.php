<?php

namespace App\Console\Commands;

use App\Models\Billdate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class WaterMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:watermail';

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
                           $bil_water = $bil->water_bill;//select colum in database
                           $ago = $bil_water-1;// decremrnt 1

                            if ($bil_water == $today) {
                                       $adminMail = User::where('role', 'admin')->select('email')->get();
                                        $emails = [];
                                        foreach ($adminMail as $mail) {
                                            $emails[] = $mail['email'];
                                        }
                                        Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                            $message->to($emails)->subject('Have You Paid water bill?');
                                        });

                            }elseif ($ago == $today) {
                                        $adminMail = User::where('role', 'admin')->select('email')->get();
                                        $emails = [];
                                        foreach ($adminMail as $mail) {
                                            $emails[] = $mail['email'];
                                        }
                                        Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                            $message->to($emails)->subject('Have You Paid water bill?');
                                        });
                            }
                         }
        // $today = now()->format('d');
        // $water_bill= Billdate::value('water_bill');

        // $b = $water_bill-1;

        // if ($today == $water_bill) {

        //     $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.water', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid water bill?');
        //     });

        // }elseif ($today == $b) {
        //          $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.a', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid water bill?');
        //     });
        //  }
    }
}
