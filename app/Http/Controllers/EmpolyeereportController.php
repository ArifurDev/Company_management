<?php

namespace App\Http\Controllers;

use App\Models\empolyeereport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmpolyeereportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empolyees =empolyeereport::latest()->paginate(30);
        $empolyeereport_onlyTrashed = empolyeereport::onlyTrashed()->get();
        return view('dashbord.empolyeereport.showreport',compact('empolyees','empolyeereport_onlyTrashed'));

    }
    public function getdate(Request $request)
    {

        $startDate = Carbon::createFromFormat('Y-m-d', $request->fromdate)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $request->today)->endOfDay();

        $empolyees = empolyeereport::whereBetween('created_at', [$startDate, $endDate])->get();
        return view('dashbord.empolyeereport.search_getdate_data',compact('empolyees'));
    }
    public function details($id)
    {
       $details = empolyeereport::find($id);
       return view('dashbord.empolyeereport.details',compact('details'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        $total = $request->incoming + $request->outgoing;
        $cash = $request->incoming - $request->outgoing;
        $email = Auth::user()->email;
        empolyeereport::insert([
            "company" => $request->company,
            "empolyee" => $email,
            "incoming" => $request->incoming,
            "outgoing" => $request->outgoing,
            "total" => $total,
            "cash" => $cash,
            "card" => $request->card,
            "note" => $request->note,
            "created_at" => now(),
         ]);
         return back()->withSuccess('Empolyee Report submit Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empolyeereport  $empolyeereport
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
    public function edit( $id)
    {
       $empolyees = empolyeereport::find($id);
       return view('dashbord.empolyeereport.editempolyeereport',compact('empolyees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empolyeereport  $empolyeereport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $total = $request->incoming + $request->outgoing;
        $cash = $request->incoming - $request->outgoing;
        empolyeereport::find($id)->update([
            "company" => $request->company,
            "incoming" => $request->incoming,
            "outgoing" => $request->outgoing,
            "total" => $total,
            "cash" => $cash,
            "card" => $request->card,
            "note" => $request->note,
         ]);
         return back()->withSuccess('Empolyee Report updated Successfully');
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
        return back()->withSuccess('Empolyee Report Tmp Deleted Successfully');
    }
    public function restor($id)
    {
        empolyeereport::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('Empolyee Report Restore Successfully');

    }
    public function delete($id)
    {
        empolyeereport::onlyTrashed()->find($id)->forceDelete();
        return back()->withSuccess('Empolyee Report Deleted Forever!');

    }

    /**
     * empolyee report search
     */
    public function search(Request $request)
    {
        $output=" ";
        $empolyeereports = empolyeereport::where('company','Like','%'.$request->search.'%')->orWhere('empolyee','Like','%'.$request->search.'%')->orWhere('card','Like','%'.$request->search.'%')->get();


        foreach($empolyeereports as $empolyeereport)
        {
            $output.=

            '<tr>
            <td> '.$empolyeereport->company.' </td>
            <td> '.$empolyeereport->empolyee.' </td>
            <td> '.$empolyeereport->incoming.' </td>
            <td> '.$empolyeereport->outgoing.' </td>
            <td> '.$empolyeereport->card.' </td>
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
    public function datesearch(Request $request)
    {
      return $request;
    }
}
