<?php

namespace App\Http\Controllers;

use App\Models\Loandetaile;
use App\Models\Mainloan;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use PDF;
class MainloanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $onlyTrashed = Mainloan::onlyTrashed()->where('status','processing')->get();
       $loan_information =  Mainloan::where('status','processing')->get();
       return view('dashbord.admin.main_loan.show',compact('loan_information','onlyTrashed'));
    }

    public function complete_loan()
    {
       $onlyTrashed = Mainloan::onlyTrashed()->where('status','complete')->get();
       $loan_information =  Mainloan::where('status','complete')->get();
       return view('dashbord.admin.main_loan.complete',compact('loan_information','onlyTrashed'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashbord.admin.main_loan.create');
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
            'name' =>'required',
            'phone'=>'required',
            'amount' =>'required',
            'loan_type' =>'required',
            'payment_date' =>'required',
            'image' =>'required'
        ],[
            'name' => 'Enter Name please',
            'phone'=>'Enter Phone number please',
            'amount' =>'Enter Amount please',
            'payment_date' =>'Select Payment Date please',
            'image' =>'Select Image'
        ]);

        $par_install =   $request->amount / $request->installment;
        //image upload image
        $file_name = auth()->id() . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $img = Image::make($request->file('image'));
        $img->save(base_path('public/upload/loan_image/' . $file_name), 80);

        $data =new Mainloan;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->amount = $request->amount;
        $data->installment = $request->installment;
        $data->per_installment = $par_install;
        $data->loan_type = $request->loan_type;
        $data->payment_date = $request->payment_date;
        $data->status = 'processing';
        $data->image=$file_name;

        $data->save();
        $notification = array(
            'message' => 'Loan information Added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mainloan  $mainloan
     * @return \Illuminate\Http\Response
     */
    public function show(Mainloan $mainloan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mainloan  $mainloan
     * @return \Illuminate\Http\Response
     */
    public function edit(Mainloan $mainloan)
    {
        return view('dashbord.admin.main_loan.edit',compact('mainloan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mainloan  $mainloan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mainloan $mainloan)
    {
        $request->validate([
            'name' =>'required',
            'phone'=>'required',
            'amount' =>'required',
            'loan_type' =>'required',
            'payment_date' =>'required',
        ],[
            'name' => 'Enter Name please',
            'phone'=>'Enter Phone number please',
            'amount' =>'Enter Amount please',
            'payment_date' =>'Select Payment Date please',
        ]);

        $par_install =   $request->amount / $request->installment;

        $mainloan->update([
            "name" =>$request->name,
            "phone"=>$request->phone,
            "email" =>$request->email,
            "amount"=> $request->amount,
            "installment"=> $request->installment,
            "per_installment"=> $par_install,
            "loan_type"=> $request->loan_type,
            "payment_date" =>$request->payment_date,
            "status" =>'processing',
        ]);
        if ($request->hasFile('image')) {
            unlink(base_path('public/upload/loan_image/'.$mainloan->image));
             //image upload image
             $file_name = auth()->id() . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
             $img = Image::make($request->file('image'));
             $img->save(base_path('public/upload/loan_image/' . $file_name), 80);
             $mainloan->update([
                "image" => $file_name,
             ]);
        }
         $notification = array(
            'message' => 'Loan information Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mainloan  $mainloan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mainloan $mainloan)
    {

        if ($mainloan->status == 'complete') {
            $notification = array(
                'message' => "You can't delete this Loan info because loan complete",
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $id = $mainloan->id;
            $loan_installments = Loandetaile::where('mainloan_id',$id)->get();
            foreach ($loan_installments as $installments ) {
             // $installments->delete();
             $installment = $installments->id;
             Loandetaile::where('id',$installment)->delete();
            }
             $mainloan->delete();
              $notification = array(
                 'message' => 'Loan information & loan installment temp Deleted',
                 'alert-type' => 'warning'
             );
             return redirect()->back()->with($notification);
        }





    }



    public function restor($id){
        Mainloan::onlyTrashed($id)->restore();

        $notification = array(
            'message' => 'Loan information Restore',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function delete($id){
       $trash_info = Mainloan::onlyTrashed($id)->first();
       unlink(base_path('public/upload/loan_image/'.$trash_info->image));

       Mainloan::onlyTrashed($id)->forceDelete();

        $notification = array(
            'message' => 'Loan information Delete Forever',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //status change
    public function status_change(Request $request,$id)
    {
        $main_loan_info =  Mainloan::where('id',$id)->first();
        $pay_installment = Loandetaile::where('mainloan_id',$id)->sum('amount');
        if ($main_loan_info->amount == $pay_installment) {
            Mainloan::find($id)->update([
                'status' =>$request->status
            ]);
            $notification = array(
                'message' => 'Complete loan',
                'alert-type' => 'success'
            );
            return redirect()->route('mainloan.complete')->with($notification);
        }else{
            $notification = array(
                'message' => 'something wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    //download pdf
    public function download_pdf($id)
    {
       $main_loan_info = Mainloan::find($id);
       $installment_info = Loandetaile::where('mainloan_id',$id)->get();

       $pdf = PDF::loadView('dashbord.admin.main_loan.download',compact('main_loan_info','installment_info'));
       //    $pdf = PDF::loadView('dashbord.admin.main_loan.pdf',);
       return $pdf->download('complete.pdf');
    }
}
