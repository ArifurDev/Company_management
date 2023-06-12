<?php

namespace App\Http\Controllers;

use App\Models\reciveloan;
use Illuminate\Http\Request;

class ReciveloanController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        $loanRecive = reciveloan::latest()->get();
        $loanRecive_trashed = reciveloan::onlyTrashed()->get();
        return view('dashbord.admin.loan.loanRecive.create', compact('loanRecive','loanRecive_trashed'));
    }

    public function store(Request $request)
    {
        $loanSend = new reciveloan;
        $loanSend->name = $request->name;
        $loanSend->email = $request->email;
        $loanSend->number = $request->number;
        $loanSend->amount = $request->amount;
        $loanSend->recive_date = $request->recive_date;
        $loanSend->save();
        $notification = array(
            'message' => 'Send Loan info submit successfull',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }

    public function edit($id)
    {
        $loanRecive = reciveloan::find($id);

        return view('dashbord.admin.loan.loanRecive.edit',compact('loanRecive'));
    }
    public function update(Request $request, $id)
    {
        reciveloan::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'amount' => $request->amount,
            'recive_date' => $request->recive_date,
        ]);
        $notification = array(
            'message' => 'Send Loan info update successfull',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }
    public function destroy($id)
    {
        reciveloan::find($id)->delete();
        $notification = array(
            'message' => 'Send Loan info Temp Delete',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);

    }
    public function restor($id)
    {
        reciveloan::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Send Loan info Restor Successfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }
    public function delete($id)
    {
       reciveloan::onlyTrashed()->find($id)->forceDelete();
       $notification = array(
        'message' => 'Send Loan info Delete forever',
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
