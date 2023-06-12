<?php

namespace App\Console\Commands;

use App\Models\Billdate;
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
                        //new code

                        $bill =  Billdate::all();
                        $today = now()->format('d');

                         foreach ($bill as $bil) {
                           $bil_empolyee = $bil->empolyee;//select colum in database
                           $ago = $bil_empolyee-1;// decremrnt 1

                            if ($bil_empolyee == $today) {
                                       $adminMail = User::where('role', 'admin')->select('email')->get();
                                        $emails = [];
                                        foreach ($adminMail as $mail) {
                                            $emails[] = $mail['email'];
                                        }
                                        Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                            $message->to($emails)->subject('Have You Paid Your Employees?');
                                        });

                            }elseif ($ago == $today) {
                                        $adminMail = User::where('role', 'admin')->select('email')->get();
                                        $emails = [];
                                        foreach ($adminMail as $mail) {
                                            $emails[] = $mail['email'];
                                        }
                                        Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                            $message->to($emails)->subject('Have You Paid Your Employees?');
                                        });
                            }
                         }


        // $today = now()->format('d');
        // $empolyee= Billdate::value('empolyee');
        // $b = $empolyee-1;
        // if ($today == $empolyee) {

        //     $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.empolyee', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid Your Employees?');
        //     });

        // }elseif ($today == $b) {
        //          $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.a', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid Your Employees?');
        //     });
        //  }



    }
}
