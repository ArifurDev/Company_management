<?php

namespace App\Http\Controllers;

use App\Models\empolyee;
use App\Models\Empolyeeinfo;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class EmpolyeeinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashed_info = Empolyeeinfo::onlyTrashed()->get();
        $empolyeeinfo = Empolyeeinfo::all();
        return view('dashbord.empolyeeinfo.index',compact('empolyeeinfo','trashed_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empolyee =  User::where('role','empolyees')->get();
        return view('dashbord.empolyeeinfo.create',compact('empolyee'));
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
            'photo' =>"mimes:png,jpg",
        ]);

        $data =new Empolyeeinfo;
        $data['salary_raised'] = $request->salary_raised;
        $data['salary_receivable'] = $request->salary_receivable;
        $data['loan_taken'] = $request->loan_taken;
        $data['loan_repaid'] = $request->loan_repaid;
        $data['visa_url'] = $request->visa_url;
        $data['password'] = $request->password;
        $data['bank_name'] = $request->bank_name;
        $data['bank_account_number'] = $request->bank_account_number;
        $data['exchange_name'] = $request->exchange_name;
        $data['exchange_account_number'] = $request->exchange_account_number;
        $data['bank_card_number'] = $request->bank_card_number;
        $data['Pin'] = $request->Pin;
        $data['online_transfer_Password'] = $request->online_transfer_Password;
        $data['a'] = $request->a;
        $data['b'] = $request->b;
        $data['c'] = $request->c;
        $data['d'] = $request->d;
        $data['e'] = $request->e;
        $data['email'] = $request->email;

        $data->save();
        $notification = array(
            'message' => 'Empolyee information Added',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empolyeeinfo  $empolyeeinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Empolyeeinfo $empolyeeinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empolyeeinfo  $empolyeeinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Empolyeeinfo $empolyeeinfo)
    {
        $empolyee =  User::where('role','empolyees')->get();
        return view('dashbord.empolyeeinfo.edit',compact('empolyeeinfo','empolyee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empolyeeinfo  $empolyeeinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empolyeeinfo $empolyeeinfo)
    {
        $empolyeeinfo->update([
            'salary_raised' => $request->salary_raised,
            'salary_receivable' => $request->salary_receivable,
            'loan_taken' => $request->loan_taken,
            'loan_repaid' => $request->loan_repaid,
            'visa_url' => $request->visa_url,
            'password' => $request->password,
            'bank_name' => $request->bank_name,
            'bank_account_number' => $request->bank_account_number,
            'exchange_name' => $request->exchange_name,
            'exchange_account_number' => $request->exchange_account_number,
            'bank_card_number' => $request->bank_card_number,
            'Pin' => $request->Pin,
            'online_transfer_Password' => $request->online_transfer_Password,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'e' => $request->e,
            'email' => $request->email,

        ]);

        $notification = array(
            'message' => 'Empolyee information Update',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empolyeeinfo  $empolyeeinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empolyeeinfo $empolyeeinfo)
    {
        $empolyeeinfo->delete();
        $notification = array(
            'message' => 'Empolyee information temp Deleted',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }


    public function restore($id)
    {
      Empolyeeinfo::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Empolyee information restore success',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }


    public function delete($id)
    {
      Empolyeeinfo::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Empolyee information Deleted',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);

    }

}
