<?php

namespace App\Console\Commands;

use App\Models\Billdate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SewerageMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:seweragemail';

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
                           $bil_sewerage = $bil->sewerage_bill;//select colum in database
                           $ago = $bil_sewerage-1;// decremrnt 1

                            if ($bil_sewerage == $today) {
                                       $adminMail = User::where('role', 'admin')->select('email')->get();
                                        $emails = [];
                                        foreach ($adminMail as $mail) {
                                            $emails[] = $mail['email'];
                                        }
                                        Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                            $message->to($emails)->subject('Have You Paid Sewerage Bill?');
                                        });

                            }elseif ($ago == $today) {
                                        $adminMail = User::where('role', 'admin')->select('email')->get();
                                        $emails = [];
                                        foreach ($adminMail as $mail) {
                                            $emails[] = $mail['email'];
                                        }
                                        Mail::send('adminemails.a', [], function ($message) use ($emails) {
                                            $message->to($emails)->subject('Have You Paid Sewerage Bill?');
                                        });
                            }
                         }

        // $today = now()->format('d');
        // $sewerage_bill= Billdate::value('sewerage_bill');

        // $b = $sewerage_bill-1;

        // if ($today == $sewerage_bill) {

        //     $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.sewerage', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid sewerage bill?');
        //     });

        // }elseif ($today == $b) {
        //          $adminMail = User::where('role', 'admin')->select('email')->get();
        //     $emails = [];
        //     foreach ($adminMail as $mail) {
        //         $emails[] = $mail['email'];
        //     }
        //     Mail::send('adminemails.a', [], function ($message) use ($emails) {
        //         $message->to($emails)->subject('Have You Paid sewerage bill?');
        //     });
        //  }

    }
}
