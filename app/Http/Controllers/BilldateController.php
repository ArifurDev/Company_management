<?php

namespace App\Http\Controllers;

use App\Models\Billdate;
use App\Models\comopany;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BilldateController extends Controller
{
    public function index()
    {
       $payment_date = Billdate::all();
        return view('dashbord.admin.all_date.index',compact('payment_date'));

    }
    public function create(){
       $company_info = comopany::all();
        return view('dashbord.admin.all_date.create',compact('company_info'));
    }
    public function store(Request $request){
        $request->validate([
            'company_name' => 'required|unique:billdates,company_name',
        ]);

       $company_id = comopany::where('compony_name',$request->company_name)->value('id');

        $payment_date = new Billdate;

        $payment_date->company_id = $company_id;
        $payment_date->company_name = $request->company_name;

        $payment_date->house_rent = $request->house_rent;
        $payment_date->gard_bill = $request->gard_bill;
        $payment_date->electricity_bill = $request->electricity_bill;
        $payment_date->sewerage_bill = $request->sewerage_bill;
        $payment_date->water_bill = $request->water_bill;
        $payment_date->fewa_bill = $request->fewa_bill;
        $payment_date->wifi_bill = $request->wifi_bill;
        $payment_date->a = $request->a;
        $payment_date->b = $request->b;
        $payment_date->c = $request->c;
        $payment_date->empolyee = $request->empolyee;

        $payment_date->save();
        $notification = array(
            'message' => 'Payment date insert Successfull',
            'alert-type' => 'success'
            );
       return redirect()->back()->with($notification);

    }

    public function edit($id)
    {
        $company_info =comopany::all();
        $payment_date = Billdate::find($id);
        return view('dashbord.admin.all_date.edit',compact('payment_date','company_info'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'company_name' => 'unique:billdates,company_name,'.$id,
        ]);

       $company_id = comopany::where('compony_name',$request->company_name)->value('id');
        Billdate::find($id)->update([
             'company_id' => $company_id,
             'company_name' => $request->company_name,
             'house_rent' => $request->house_rent,
             'gard_bill' => $request->gard_bill,
             'electricity_bill' => $request->electricity_bill,
             'sewerage_bill' => $request->sewerage_bill,
             'water_bill' => $request->water_bill,
             'fewa_bill' => $request->fewa_bill,
             'wifi_bill' => $request->wifi_bill,
             'a' => $request->a,
             'b' => $request->b,
             'c' => $request->c,
             'empolyee' => $request->empolyee,
        ]);
            $notification = array(
                'message' => 'Bill Date Updated',
                'alert-type' => 'success'
                );
           return redirect()->back()->with($notification);
    }

    public function distroy($id){
        Billdate::find($id)->delete();
        $notification = array(
            'message' => 'Bill Date Deleted',
            'alert-type' => 'info'
            );
       return redirect()->back()->with($notification);
    }


    //testing parpas
    // public function test(){

    // }


    //



    // $today = now()->format('d');
    // $a= Billdate::value('a');

    // $b = $a-1;

    // if ($today == $a) {

        // $adminMail = User::where('role', 'admin')->select('email')->get();
        // $emails = [];
        // foreach ($adminMail as $mail) {
        //     $emails[] = $mail['email'];
        // }
        // Mail::send('adminemails.a', [], function ($message) use ($emails) {
        //     $message->to($emails)->subject('Have You Paid A bill?');
        // });

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

    //
}
