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
        $loanRecive = reciveloan::all();
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

        return back()->withSuccess('Send Loan info submit successfull');
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

        return back()->withSuccess('Send Loan info update successfull');
    }
    public function destroy($id)
    {
        reciveloan::find($id)->delete();
        return back()->withSuccess('Send Loan info Temp Delete');
    }
    public function restor($id)
    {
        reciveloan::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('Send Loan info Restor Successfully');
    }
    public function delete($id)
    {
       reciveloan::onlyTrashed()->find($id)->forceDelete();
        return back()->withSuccess('Send Loan info Delete forever');
    }
}
