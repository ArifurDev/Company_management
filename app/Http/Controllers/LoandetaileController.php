<?php

namespace App\Http\Controllers;

use App\Models\Loandetaile;
use App\Models\Mainloan;
use Illuminate\Http\Request;

class LoandetaileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $main_loan_id =$id;
        $main_loan_info =  Mainloan::where('id',$main_loan_id)->first();
        $installment_count = Loandetaile::where('mainloan_id',$main_loan_id)->count();

        return view('dashbord.admin.loan_datiles.create',compact('main_loan_id','main_loan_info','installment_count'));

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
            'installment' =>'required',
            'amount' => 'required',
        ],[
            "installment" =>"please Enter Loan Installment",
            "amount"=>"please Enter Per Installment Amount",
        ]);

         $installment_check =  Loandetaile::where('mainloan_id',$request->mainloan_id)->where('installment',$request->installment)->first();

         $pay_installment_count = Loandetaile::where('mainloan_id',$request->mainloan_id)->count();

         $main_loan =  Mainloan::where('id',$request->mainloan_id)->first();

         $total_installment =$main_loan->installment;

         $total_installment =$main_loan->installment -1 ;

         $per_installment = $main_loan->per_installment;//per installment price get

        if (!$installment_check) {
             if($per_installment == $request->amount){ // check per installment amount is equal  or not to main loan

                    if ($pay_installment_count ==  $total_installment) {
                        $id =$request->mainloan_id;
                        Mainloan::find($id)->update([
                            'status' =>'complete'
                        ]);
                        $notification = array(
                            'message' => 'Complete Loan installment',
                            'alert-type' => 'success'
                        );
                        return redirect()->route('mainloan.index')->with($notification);
                    }else{
                        Loandetaile::insert([
                            'mainloan_id'=> $request->mainloan_id,
                            'installment'=>$request->installment,
                            'amount' => $request->amount,
                            'date' => now(),
                            'status' => "processing",
                            'created_at' => now(),
                        ]);

                        $notification = array(
                            'message' => 'Loan Installment Successfull',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                        if ($pay_installment_count == $total_installment) {
                            $id =$request->mainloan_id;
                            Mainloan::find($id)->update([
                                'status' =>'complete'
                            ]);
                            $notification = array(
                                'message' => 'Complete Loan installment',
                                'alert-type' => 'success'
                            );
                            return redirect()->route('mainloan.index')->with($notification);
                        }

                    }
             }else{
                $notification = array(
                    'message' => 'something wrong || Per installment and enter installment not same',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
             }
        }else{
            $notification = array(
                'message' => 'something wrong || You Already Pay This Installment',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loandetaile  $loandetaile
     * @return \Illuminate\Http\Response
     */
    public function show($id) //selected mainloan installment show
    {
       $main_loan_info =  Mainloan::where('id',$id)->first();
       $loan_installment = Loandetaile::where('mainloan_id',$id)->get();
       $installment_count = Loandetaile::where('mainloan_id',$id)->count();

       return view('dashbord.admin.main_loan.installment',compact('main_loan_info','loan_installment','installment_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loandetaile  $loandetaile
     * @return \Illuminate\Http\Response
     */
    public function edit(Loandetaile $loandetaile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loandetaile  $loandetaile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loandetaile $loandetaile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loandetaile  $loandetaile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loandetaile $loandetaile)
    {
        //
    }
}
