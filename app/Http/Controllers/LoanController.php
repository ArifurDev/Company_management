<?php

namespace App\Http\Controllers;

use App\Models\loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        $loanSend = loan::latest()->get();
        $loanSend_trashed = loan::onlyTrashed()->latest()->get();
        return view('dashbord.admin.loan.loanSend.create', compact('loanSend','loanSend_trashed'));
    }

    public function store(Request $request)
    {
        $loanSend = new loan;
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
        $loanSend = loan::find($id);

        return view('dashbord.admin.loan.loanSend.edit',compact('loanSend'));
    }
    public function update(Request $request, $id)
    {
        loan::find($id)->update([
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
        loan::find($id)->delete();
        $notification = array(
            'message' => 'Send Loan info Temp Delete',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);

    }
    public function restor($id)
    {
        loan::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Send Loan info Restor Successfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }
    public function delete($id)
    {
        loan::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Send Loan info Delete forever',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);

    }
}
