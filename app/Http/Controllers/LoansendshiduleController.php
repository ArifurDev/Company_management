<?php

namespace App\Http\Controllers;

use App\Models\Loansendshidule;
use Illuminate\Http\Request;

class LoansendshiduleController extends Controller
{
    public function store(Request $request)
    {
        $loanInstallment = new Loansendshidule;
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

       $loan_send_installment_shidule = Loansendshidule::where('email',$email)->latest()->get();
       $send_installment_trashed = Loansendshidule::onlyTrashed()->latest()->get();
       return view('dashbord.admin.loan.loanSend.installment',compact('loan_send_installment_shidule','send_installment_trashed'));

    }
    public function edit($id)
    {
        $send_installment = Loansendshidule::find($id);
        return view('dashbord.admin.loan.loanSend.installmentEdit',compact('send_installment'));
    }
    public function update(Request $request, $id)
    {
        Loansendshidule::find($id)->update([
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
        Loansendshidule::find($id)->delete();
        return back()->withSuccess('info temp deleted!');
    }
    public function restor($id)
    {
        Loansendshidule::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('Restor Successfully');
    }
    public function delete($id)
    {
        Loansendshidule::onlyTrashed()->find($id)->forceDelete();
        return back()->withSuccess('Delete forever!');
    }
}
