<?php

namespace App\Http\Controllers;

use App\Models\adminriports;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminriportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminriports = adminriports::latest()->paginate(30);
        $adminriports_onlyTrashed = adminriports::onlyTrashed()->get();

        return view('dashbord.admin.report.show', compact('adminriports', 'adminriports_onlyTrashed'));
    }

    /**
     * live search
     */
    public function getdate(Request $request)
    {
        if ($request->fromdate != null) {
            if ($request->today != null) {
                // $adminriports = adminriports::whereBetween('created_at',[$request->fromdate.' 00:00:00',$request->today.' 29:59:59',])->get();
                // return $adminriports;
                // return view('dashbord.admin.report.search_result_data',compact('empolyees'));
                $startDate = Carbon::createFromFormat('Y-m-d', $request->fromdate)->startOfDay();
                $endDate = Carbon::createFromFormat('Y-m-d', $request->today)->endOfDay();

                $search_result_data = adminriports::whereBetween('created_at', [$startDate, $endDate])->get();

                return view('dashbord.admin.report.search_result_data', compact('search_result_data'));
            } else {
                return back()->withSuccess('You Not Select Today Data');
            }
        } else {
            return back()->withSuccess('You Not Select Fromdate Data');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashbord.admin.report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $total = $request->house_rent + $request->gard_bill + $request->electricity_bill + $request->sewerage_bill + $request->expanse + $request->personal + $request->water_bill + $request->fewa_bill + $request->wifi_bill + $request->a + $request->b + $request->c;

        adminriports::insert([
            'house_rent' => $request->house_rent,
            'gard_bill' => $request->gard_bill,
            'electricity_bill' => $request->electricity_bill,
            'sewerage_bill' => $request->sewerage_bill,
            'expanse' => $request->expanse,
            'personal' => $request->personal,

            'water_bill' => $request->water_bill,
            'fewa_bill' => $request->fewa_bill,
            'wifi_bill' => $request->wifi_bill,

            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,

            'note' => $request->note,

            'total' => $total,
            'created_at' => now(),
        ]);

        return back()->withSuccess('Admin Daily Report submit Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(adminriports $adminriports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adminriports  $adminriports
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminriports = adminriports::find($id);

        return view('dashbord.admin.report.edit', compact('adminriports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\adminriports  $adminriports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $total = $request->house_rent + $request->gard_bill + $request->electricity_bill + $request->sewerage_bill + $request->expanse + $request->personal + $request->water_bill + $request->fewa_bill + $request->wifi_bill + $request->a + $request->b + $request->c;
         adminriports::find($id)->update([
            'house_rent' => $request->house_rent,
            'gard_bill' => $request->gard_bill,
            'electricity_bill' => $request->electricity_bill,
            'sewerage_bill' => $request->sewerage_bill,
            'expanse' => $request->expanse,
            'personal' => $request->personal,

            'water_bill' => $request->water_bill,
            'fewa_bill' => $request->fewa_bill,
            'wifi_bill' => $request->wifi_bill,

            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,

            'note' => $request->note,
            'total' => $total,
        ]);

        return back()->withSuccess('Admin Daily Report update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adminriports  $adminriports
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        adminriports::find($id)->delete();

        return back()->withSuccess('Admin Daily Report Tmp Deleted Successfully');
    }

    public function restor($id)
    {
        adminriports::onlyTrashed()->find($id)->restore();

        return back()->withSuccess('Admin Daily Report Restor Successfully');
    }

    public function delete($id)
    {
        adminriports::onlyTrashed()->find($id)->forceDelete();

        return back()->withSuccess('Admin Daily Report Deleted Forever!');
    }
}
