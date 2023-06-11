<?php

namespace App\Http\Controllers;

use App\Models\Billdate;
use App\Models\comopany;
use Illuminate\Http\Request;

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
        return back()->withSuccess('Payment date insert Successfull');

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
                'message' => 'please try again',
                'alert-type' => 'warning'
                );
           return redirect()->back()->with($notification);
    }


    public function test(){
      $bill =  Billdate::all();
      dd($bill);
    //   foreach ($bill as $bil) {
    //       echo  $bil;
    //   }
    }
}
