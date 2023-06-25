<?php

namespace App\Http\Controllers;

use App\Models\Billdate;
use App\Models\Loanrecivesidule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoanrecivesiduleController extends Controller
{
    public function store(Request $request)
    {
        $loanInstallment = new Loanrecivesidule;
        $loanInstallment->name = $request->name;
        $loanInstallment->email = $request->email;
        $loanInstallment->amount = $request->amount;
        $loanInstallment->amount_due = $request->amount_due;
        $loanInstallment->installment = $request->installment;
        $loanInstallment->payment_date = $request->payment_date;
        $loanInstallment->save();
        $notification = array(
            'message' => 'loan  Installment info submit successfull',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }
    public function show($number)
    {
       $loan_recive_installment_shidule = Loanrecivesidule::where('number',$number)->latest()->get();
       $recive_installment_trashed = Loanrecivesidule::onlyTrashed()->get();
       return view('dashbord.admin.loan.loanRecive.installment',compact('loan_recive_installment_shidule','recive_installment_trashed'));

    }
    public function edit($id)
    {
        $recive_installment = Loanrecivesidule::find($id);
        return view('dashbord.admin.loan.loanRecive.installmentEdit',compact('recive_installment'));
    }
    public function update(Request $request, $id)
    {
        Loanrecivesidule::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'amount' => $request->amount,
            'amount_due' => $request->amount_due,
            'installment' => $request->installment,
            'payment_date' => $request->payment_date,
        ]);
        $notification = array(
            'message' => 'update successfull',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        Loanrecivesidule::find($id)->delete();
        $notification = array(
            'message' => 'info temp deleted!',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);
    }
    public function restor($id)
    {
        Loanrecivesidule::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Restor Successfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }
    public function delete($id)
    {
        Loanrecivesidule::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Delete forever!',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);

    }






}
