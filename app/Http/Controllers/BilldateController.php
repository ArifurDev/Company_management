<?php

namespace App\Http\Controllers;

use App\Models\Billdate;
use Illuminate\Http\Request;

class BilldateController extends Controller
{
    // public function show()
    // {
    //    $payment_date = Billdate::latest()->get();
    //     return view('dashbord.admin.all_date.show',compact('payment_date'));

    // }
    public function edit()
    {
        $payment_date = Billdate::latest()->get();
       return view('dashbord.admin.all_date.edit',compact('payment_date'));
    }
    public function update(Request $request,$id)
    {
       Billdate::find($id)->update([
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
       return back()->withSuccess('Payment date Change Successfull');
    }
}
