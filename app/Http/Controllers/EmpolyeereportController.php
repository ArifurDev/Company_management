<?php

namespace App\Http\Controllers;

use App\Exports\AllreportsExport;
use App\Exports\empolyeereportsExport;
use App\Models\comopany;
use App\Models\empolyeereport;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class EmpolyeereportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $login_user = Auth::user();
        // $login_result = User::where('compony_name','$login_user->compony_name')
        // if ($login_user->role == 'empolyees') {
        //     return 'empolyees';
        // } else {
        //     return 'admin';
        // }

        $empolyees = empolyeereport::latest()->get();
        $empolyeereport_onlyTrashed = empolyeereport::onlyTrashed()->get();

        return view('dashbord.empolyeereport.showreport', compact('empolyees', 'empolyeereport_onlyTrashed'));
    }

    public function getdate(Request $request)
    {
        $request->validate([
            '*'=>'required'
        ]);

        $startDate = Carbon::createFromFormat('Y-m-d', $request->fromdate)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $request->today)->endOfDay();

        $empolyees = empolyeereport::whereBetween('created_at', [$startDate, $endDate])->get();

        return view('dashbord.empolyeereport.search_getdate_data', compact('empolyees'));
    }

    public function details($id)
    {
        $details = empolyeereport::find($id);

        return view('dashbord.empolyeereport.details', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashbord.empolyeereport.reportcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);
        $incoming = $request->incoming_card + $request->incoming_cash;


        $cash = $incoming - $request->outgoing;
        $compony_name = Auth::user()->compony_name;
        $email = Auth::user()->email;

        if ($compony_name == null) {
            $notification = array(
                'message' => 'Before add a Company to your profile After that submit data',
                'alert-type' => 'info'
                );
            return redirect()->back()->with($notification);

        } else {
            $comopany_id =  comopany::where('compony_name',$compony_name)->value('id');
            empolyeereport::insert([
                'compony_id' => $comopany_id,
                'company' => $compony_name,
                'empolyee' => $email,
                'incoming' => $incoming,
                'incoming_card' => $request->incoming_card,
                'incoming_cash' => $request->incoming_cash,
                'outgoing' => $request->outgoing,

                'cash' => $cash,
                'note' => $request->note,
                'created_at' => now(),
            ]);
            $notification = array(
                'message' => 'Empolyee Report submit Successfully',
                'alert-type' => 'success'
                );
            return redirect()->back()->with($notification);

        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(empolyeereport $empolyeereport)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empolyeereport  $empolyeereport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empolyees = empolyeereport::find($id);
        $comopanies = comopany::all();

        return view('dashbord.empolyeereport.editempolyeereport', compact('empolyees', 'comopanies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\empolyeereport  $empolyeereport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $incoming = $request->incoming_card + $request->incoming_cash;

        $cash = $incoming - $request->outgoing;

        $comopany_id =  comopany::where('compony_name',$request->company)->value('id');
        empolyeereport::find($id)->update([
            'compony_id' => $comopany_id,
            'company' => $request->company,
            'incoming' => $incoming,
            'incoming_card' => $request->incoming_card,
            'incoming_cash' => $request->incoming_cash,
            'outgoing' => $request->outgoing,
            'cash' => $cash,
            'note' => $request->note,
        ]);
        $notification = array(
            'message' => 'Empolyee Report updated Successfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empolyeereport  $empolyeereport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        empolyeereport::find($id)->delete();
        $notification = array(
            'message' => 'Empolyee Report Tmp Deleted Successfully',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);

    }

    public function restor($id)
    {
        empolyeereport::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Empolyee Report Restore Successfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        empolyeereport::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Empolyee Report Deleted Forever!',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);
    }

    /**
     * empolyee report search
     */
    public function search(Request $request)
    {
        $output = ' ';
        $empolyeereports = empolyeereport::where('company', 'Like', '%'.$request->search.'%')->orWhere('empolyee', 'Like', '%'.$request->search.'%')->orWhere('incoming_card', 'Like', '%'.$request->search.'%')->orWhere('incoming_cash', 'Like', '%'.$request->search.'%')->orWhere('incoming_card', 'Like', '%'.$request->search.'%')->orWhere('created_at', 'Like', '%'.$request->search.'%')->get();

        foreach ($empolyeereports as $empolyeereport) {
            $output .=

            '<tr>
            <td> '.$empolyeereport->company.' </td>
            <td> '.$empolyeereport->empolyee.' </td>
            <td> '.$empolyeereport->incoming_card.' </td>
            <td> '.$empolyeereport->incoming_cash.' </td>
            <td> '.$empolyeereport->incoming .' </td>
            <td> '.$empolyeereport->outgoing.' </td>
            <td> '.$empolyeereport->cash.' </td>
            <td> '.$empolyeereport->created_at.' </td>
            <td> '.'
            <a  class="btn btn-primary" href="/empolyee/report/edit/'.$empolyeereport->id.'" title="edit">
                 '.'<i class="mdi mdi-border-color"></i></a>

            <a  class="btn btn-primary" href="/empolyee/report/destroy/'.$empolyeereport->id.'" title="edit">
                '.'<i class="mdi mdi-delete"></i></a>
            '.' </td>
            </tr>';
        }

        return response($output);
    }

    // public function datesearch(Request $request)
    // {
    //     return $request;
    // }



    //download this month report excel file
    public function export(){
        return Excel::download(new empolyeereportsExport, 'This month Report.xlsx');
    }


    //download all reports excel file
    public function all_export(){
        return Excel::download(new AllreportsExport, 'All Report.xlsx');
    }
}
