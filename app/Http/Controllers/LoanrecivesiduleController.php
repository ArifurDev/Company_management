<?php

namespace App\Http\Controllers;

use App\Models\Loanrecivesidule;
use App\Models\reciveloan;
use Illuminate\Http\Request;

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

        return back()->withSuccess('loan  Installment info submit successfull');
    }
    public function show($email)
    {
       $loan_recive_installment_shidule = Loanrecivesidule::where('email',$email)->latest()->get();
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

        return back()->withSuccess('update successfull');
    }
    public function destroy($id)
    {
        Loanrecivesidule::find($id)->delete();
        return back()->withSuccess('info temp deleted!');
    }
    public function restor($id)
    {
        Loanrecivesidule::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('Restor Successfully');
    }
    public function delete($id)
    {
        Loanrecivesidule::onlyTrashed()->find($id)->forceDelete();
        return back()->withSuccess('Delete forever!');
    }
}
