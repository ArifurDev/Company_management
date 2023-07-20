<?php

namespace App\Http\Controllers;

use App\Models\comopany;
use App\Models\empolyee;
use App\Models\Empolyeeinfo;
use App\Models\empolyeereport;
use App\Models\Payroll;
use App\Models\siteriports;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class EmpolyeeController extends Controller
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
    public function create()
    {
        $empolyee = User::latest()->get();
        $comopanies = comopany::all();
        //create a new empolyee
        return view('dashbord.empolyee.create', compact('empolyee', 'comopanies'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'gender' => 'required',
            'number' => 'required',
            'role' => 'required',
            'compony_name' => 'required',
        ]);
        $comopany_id =  comopany::where('compony_name',$request->compony_name)->value('id');
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'number' => $request->number,
            'role' => $request->role,
            'compony_name' => $request->compony_name,
            'compony_id' => $comopany_id,
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);
        $notification = array(
            'message' => 'Account Create Successfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(empolyee $empolyee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comopanies = comopany::all();
        $empolyee = User::find($id);

        return view('dashbord.empolyee.edit', compact('empolyee', 'comopanies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comopany_id =  comopany::where('compony_name',$request->compony_name)->value('id');

        User::find($id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'gender' => $request->gender,
            'number' => $request->number,
            'compony_name' => $request->compony_name,
            'compony_id' => $comopany_id,
        ]);
        $notification = array(
            'message' => 'Account Update Successfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        $notification = array(
            'message' => 'Account delete Successfully',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);
    }


    /**
     *selected company all information show
     */
    public function info($id)
    {
      $empolyeereport = empolyeereport::where('compony_id',$id)->get();
      $com_name = comopany::where('id',$id)->value('compony_name');
      $empolyee_count = User::where('compony_id',$id)->count();

     $com_site_reports = siteriports::where('company',$com_name )->get();

      return view('dashbord.company.info',compact('empolyeereport','empolyee_count','com_name','com_site_reports'));
    }


    /**
     * empolyee salary
     */
     public function salary_managment()
     {
        $empolyee =   DB::table('users')
                        ->join('empolyeeinfos', 'users.email', '=', 'empolyeeinfos.email')
                        ->select('users.name','users.name','users.number','users.compony_name','users.pay_date','empolyeeinfos.*')
                        ->where('users.role','empolyees')
                        ->latest()->get();


        $prev    = date('F',strtotime("-1 month"));
        $prev_full_date    = date('m/Y',strtotime("-1 month"));
        return view('dashbord.PayrollManagement.create',compact('empolyee','prev','prev_full_date'));

     }


    public function monthly_payment($email)
    {
        $empolyee_information =  DB::table('users')
                                    ->leftjoin('empolyeeinfos', 'users.email', '=', 'empolyeeinfos.email')
                                    ->leftjoin('payrolls', 'users.email', '=', 'payrolls.email')
                                    ->select('users.name','users.name','users.number','users.compony_name','users.pay_date','empolyeeinfos.*','payrolls.due','payrolls.month','payrolls.payment_type')
                                    ->where('users.email',$email)
                                    ->first();
        $prev    = date('m',strtotime("-1 month"));
        $prev_date    = date('m/Y',strtotime("-1 month"));
        //check advanch payment
        $advanch_check =  Payroll::where('email',$email)->where('payment_date',$prev_date)->where('payment_type','advance')->first();
        $paid_check =  Payroll::where('email',$email)->where('payment_date',$prev_date)->where('payment_type','none')->first();

        return view('dashbord.PayrollManagement.payment',compact('empolyee_information','prev','advanch_check','paid_check'));
    }


    /**
     * empolyee payment submit
     */
    public function salary_save(Request $request)
    {
        $request->validate([
            "payment_date" => ['required'],
            "amount" => ['required'],
            "empolyee_bank_name" => ['required'],
            "empolyee_bank_account_number" => ['required'],
        ],[
            "payment_date.required"=>'Please select Payment Date.',
            "amount.required"=>"Salary Amount is required.",
            "empolyee_bank_name.required"=>'Empolyee Banck Name required.',
            "empolyee_bank_account_number.required"=>"Empolyee Bank Account Number required."
        ]);
        $date    = $request->payment_date;
        $expload = explode('-',$date);
        $year    = $expload[0];
        $month   = $expload[1];
        $day     = $expload[2];

        $date_formate = "$month/$year";

        $due_amount   = $request->empolyee_salary - $request->amount;


        /**
         * condition
        */

        $advance_payment_check =  Payroll::where('email',$request->empolyee_email)->where('payment_type','advance')->count();
        if ($advance_payment_check && $request->payment_status == 'advance') {
            $notification = array(
                'message' => 'You have already paid in advance',
                'alert-type' => 'warning'
                );
            return redirect()->back()->with($notification);
        } else {
            $advanch_check =  Payroll::where('email',$request->empolyee_email)->where('payment_date',$date_formate)->first();
            if ($advanch_check) {
                 if ($advanch_check->payment_type == 'advance') {//Due payment
                       $prev_date    = date('m/Y',strtotime("-1 month"));
                       $empolyee_advance = Payroll::where('email',$request->empolyee_email)->where('payment_date',$prev_date)->where('payment_type','advance')->first();
                       $salary_id = $empolyee_advance->id;
                            if ($empolyee_advance->due == $request->amount) {
                                    Payroll::find($salary_id)->update([
                                        'Amount'=> $empolyee_advance->Amount + $request->amount,
                                        'due'=> '0',
                                        'payment_method' => $request->payment_system,
                                        'payment_type' => 'none',
                                    ]);
                                    User::where('email',$request->empolyee_email)->update([
                                        'pay_date' => $date_formate ,
                                    ]);
                                    $notification = array(
                                        'message' => 'Empolyee  Payment  Successfully',
                                        'alert-type' => 'success'
                                        );
                                    return redirect()->back()->with($notification);
                            } else {
                                    $notification = array(
                                        'message' => 'Empolyee Due Amount & Amount not same',
                                        'alert-type' => 'error'
                                        );
                                    return redirect()->back()->with($notification);
                            }
                 } else {
                        $notification = array(
                            'message' => 'You have already paid',
                            'alert-type' => 'warning'
                            );
                        return redirect()->back()->with($notification);
                 }

            } else {
                if ($request->payment_status == 'advance') {//check payment status
                    $data = new Payroll;
                    $data->email = $request->empolyee_email;
                    $data->company = $request->empolyee_companoy;
                    $data->bank_name = $request->empolyee_bank_name;
                    $data->banck_account_number = $request->empolyee_bank_account_number;
                    $data->salary = $request->empolyee_salary;
                    $data->Amount= $request->amount;
                    $data->due= $due_amount;
                    $data->payment_date = $date_formate;
                    $data->edit_date =  $date;
                    $data->month = $month;
                    $data->year= $year;
                    $data->payment_method = $request->payment_system;
                    $data->payment_type = $request->payment_status;

                    $data->save();

                    $notification = array(
                        'message' => 'Empolyee Advance Payment  Successfully',
                        'alert-type' => 'success'
                        );
                    return redirect()->back()->with($notification);
                } else {
                    if ($request->empolyee_salary == $request->amount) {
                        $data = new Payroll;
                        $data->email = $request->empolyee_email;
                        $data->company = $request->empolyee_companoy;
                        $data->bank_name = $request->empolyee_bank_name;
                        $data->banck_account_number = $request->empolyee_bank_account_number;
                        $data->salary = $request->empolyee_salary;
                        $data->Amount= $request->amount;
                        $data->due= $due_amount;
                        $data->payment_date = $date_formate;
                        $data->edit_date =  $date;
                        $data->month = $month;
                        $data->year= $year;
                        $data->payment_method = $request->payment_system;
                        $data->payment_type = $request->payment_status;

                        $data->save();

                        User::where('email',$request->empolyee_email)->update([
                            'pay_date' => $date_formate ,
                        ]);

                        $notification = array(
                            'message' => 'Empolyee Payment  Successfully',
                            'alert-type' => 'success'
                            );
                        return redirect()->back()->with($notification);
                    } else {
                         $notification = array(
                             'message' => 'Empolyee Salary & Pay amount not same',
                             'alert-type' => 'warning'
                             );
                         return redirect()->back()->with($notification);
                    }
                    }
                }

        }



    }

     /**
     * empolyee salary index page
     */
    public function salary_index()
    {
        $payment_information  = DB::table('payrolls')->select('payment_date')->groupBy('payment_date')->get();
        return view('dashbord.PayrollManagement.index',compact('payment_information'));
    }

     /**
     * empolyee salary index page
     */
    public function salary_pdf_download(Request $request)
    {
         $salary_datiles = Payroll::where('payment_date',$request->date)->get();

         $pdf = PDF::loadView('dashbord.PayrollManagement.download_pdf',compact('salary_datiles'));
	     return $pdf->download('salary.pdf');
    }

    public function selected_month_view(Request $request)
    {
        $date = $request->date;
        $salary_datiles = Payroll::where('payment_date',$request->date)->get();
        return view('dashbord.PayrollManagement.selected_month',compact('salary_datiles','date'));
    }
}
