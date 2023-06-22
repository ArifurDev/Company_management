<?php

namespace App\Http\Controllers;

use App\Models\Adminifo;
use App\Models\empolyee;
use App\Models\User;
use Illuminate\Http\Request;

class AdminifoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $trashed_info = Adminifo::onlyTrashed()->get();
        $information = Adminifo::all();
        return view('dashbord.admin.report.information.index',compact('information','trashed_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empolyee =  User::where('role','admin')->get();
        return view('dashbord.admin.report.information.create',compact('empolyee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' =>"required|email",
        ]);

        $data =new Adminifo;
        $data['salary_raised'] = $request->salary_raised;
        $data['salary_receivable'] = $request->salary_receivable;
        $data['loan_taken'] = $request->loan_taken;
        $data['loan_repaid'] = $request->loan_repaid;
        $data['visa_url'] = $request->visa_url;
        $data['password'] = $request->password;
        $data['card_holder_name'] = $request->card_holder_name;
        $data['card_number'] = $request->card_number;
        $data['currency'] = $request->currency;
        $data['expairy_date'] = $request->expairy_date;
        $data['bank_name'] = $request->bank_name;
        $data['bank_account_number'] = $request->bank_account_number;
        $data['exchange_name'] = $request->exchange_name;
        $data['exchange_account_number'] = $request->exchange_account_number;
        $data['bank_card_number'] = $request->bank_card_number;
        $data['Pin'] = $request->Pin;
        $data['online_transfer_Password'] = $request->online_transfer_Password;
        $data['email'] = $request->email;
        $data->save();
        $notification = array(
            'message' => 'Admin information Added',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adminifo  $adminifo
     * @return \Illuminate\Http\Response
     */
    public function show(Adminifo $adminifo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adminifo  $adminifo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $information = Adminifo::find($id);
       $empolyee =  User::where('role','admin')->get();
       return view("dashbord.admin.report.information.edit",compact('information','empolyee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adminifo  $adminifo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        Adminifo::find($id)->update([
            'salary_raised' => $request->salary_raised,
            'salary_receivable' => $request->salary_receivable,
            'loan_taken' => $request->loan_taken,
            'loan_repaid' => $request->loan_repaid,
            'visa_url' => $request->visa_url,
            'password' => $request->password,
            'card_holder_name' => $request->card_holder_name,
            'card_number' => $request->card_number,
            'currency' => $request->currency,
            'expairy_date' => $request->expairy_date,
            'bank_name' => $request->bank_name,
            'bank_account_number' => $request->bank_account_number,
            'exchange_name' => $request->exchange_name,
            'exchange_account_number' => $request->exchange_account_number,
            'bank_card_number' => $request->bank_card_number,
            'Pin' => $request->Pin,
            'online_transfer_Password' => $request->online_transfer_Password,
            'email' => $request->email,
        ]);
        $notification = array(
            'message' => 'Admin information Updated',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adminifo  $adminifo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Adminifo::find($id)->delete();

        $notification = array(
            'message' => 'Admin information deleted',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    public function restore($id)
    {
        Adminifo::onlyTrashed()->find($id)->restore();

        $notification = array(
            'message' => 'Admin information restore',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }



    public function delete($id)
    {
        Adminifo::onlyTrashed()->find($id)->forceDelete();

        $notification = array(
            'message' => 'Admin information Deleted Forever',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
}
