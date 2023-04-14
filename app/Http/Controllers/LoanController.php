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

        return back()->withSuccess('Send Loan info submit successfull');
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

        return back()->withSuccess('Send Loan info update successfull');
    }
    public function destroy($id)
    {
        loan::find($id)->delete();
        return back()->withSuccess('Send Loan info Temp Delete');
    }
    public function restor($id)
    {
        loan::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('Send Loan info Restor Successfully');
    }
    public function delete($id)
    {
        loan::onlyTrashed()->find($id)->forceDelete();
        return back()->withSuccess('Send Loan info Delete forever');
    }
}
