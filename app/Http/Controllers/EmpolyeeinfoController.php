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
        $empolyeeinfo = Empolyeeinfo::latest()->get();
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
        ]);

        $empolyeeinfo_check = Empolyeeinfo::where('email',$request->email)->first();
        if (!$empolyeeinfo_check) {
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
            $data['empolyee_salary'] = $request->empolyee_salary;

            $data->save();
            $notification = array(
                'message' => 'Empolyee information Added',
                'alert-type' => 'success'
                );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Information has already been created || Go Information Page & Edit',
                'alert-type' => 'warning'
                );
            return redirect()->back()->with($notification);
        }

        die();


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
            'empolyee_salary' => $request->empolyee_salary,

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



    //live search
    public function searching(Request $request)
    {
        $output = ' ';
        $empolyee_info = Empolyeeinfo::where('salary_raised', 'Like', '%'.$request->search.'%')->orWhere('salary_receivable', 'Like', '%'.$request->search.'%')->orWhere('loan_taken', 'Like', '%'.$request->search.'%')->orWhere('loan_repaid', 'Like', '%'.$request->search.'%')->orWhere('visa_url', 'Like', '%'.$request->search.'%')->orWhere('password', 'Like', '%'.$request->search.'%')->orWhere('bank_name', 'Like', '%'.$request->search.'%')->orWhere('bank_account_number', 'Like', '%'.$request->search.'%')->orWhere('exchange_name', 'Like', '%'.$request->search.'%')->orWhere('exchange_account_number', 'Like', '%'.$request->search.'%')->orWhere('bank_card_number', 'Like', '%'.$request->search.'%')->orWhere('Pin', 'Like', '%'.$request->search.'%')->orWhere('online_transfer_Password', 'Like', '%'.$request->search.'%')->orWhere('a', 'Like', '%'.$request->search.'%')->orWhere('b', 'Like', '%'.$request->search.'%')->orWhere('c', 'Like', '%'.$request->search.'%')->orWhere('d', 'Like', '%'.$request->search.'%')->orWhere('e', 'Like', '%'.$request->search.'%')->orWhere('email', 'Like', '%'.$request->search.'%')->orWhere('empolyee_salary', 'Like', '%'.$request->search.'%')->paginate(5);

        foreach ($empolyee_info as $empolyee) {
            $output .=
            '<tr class="border border-info">
                <td  class="text-light">'.$empolyee->email.'</td>
                <td  class="text-light">'.$empolyee->empolyee_salary.'</td>
                <td  class="text-light">'.$empolyee->salary_raised .'</td>
                <td  class="text-light">'.$empolyee->salary_receivable.'</td>
                <td  class="text-light">'.$empolyee->loan_taken.'</td>
                <td  class="text-light">'.$empolyee->loan_repaid.'</td>
                <td  class="text-light">'.$empolyee->visa_url.'</td>
                <td  class="text-light">'.$empolyee->password .'</td>
                <td  class="text-light">'.$empolyee->bank_name .'</td>
                <td  class="text-light">'.$empolyee->bank_account_number .'</td>
                <td  class="text-light">'.$empolyee->exchange_name .'</td>
                <td  class="text-light">'.$empolyee->exchange_account_number.'</td>
                <td  class="text-light">'.$empolyee->bank_card_number.'</td>
                <td  class="text-light">'.$empolyee->Pin.'</td>
                <td  class="text-light">'.$empolyee->online_transfer_Password.'</td>
                <td  class="text-light">'.$empolyee->a.'</td>
                <td  class="text-light">'.$empolyee->b.'</td>
                <td  class="text-light">'.$empolyee->c.'</td>
                <td  class="text-light">'.$empolyee->d.'</td>
                <td  class="text-light">'.$empolyee->e.'</td>
            </tr>';
        }

        return response($output);
    }

}
