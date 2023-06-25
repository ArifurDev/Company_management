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
    public function show($number)
    {

       $loan_send_installment_shidule = Loansendshidule::where('number',$number)->latest()->get();
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
        $notification = array(
            'message' => 'update successfull',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }
    public function destroy($id)
    {
        Loansendshidule::find($id)->delete();
        $notification = array(
            'message' => 'info temp deleted!',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);

    }
    public function restor($id)
    {
        Loansendshidule::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Restor Successfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }
    public function delete($id)
    {
        Loansendshidule::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Delete forever!',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }
}
