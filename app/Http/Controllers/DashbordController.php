<?php

namespace App\Http\Controllers;

use App\Models\adminriports;
use App\Models\comopany;
use App\Models\empolyeereport;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
    public function index()
    {
        $dt = new DateTime();
        $daily = $dt->format('Y-m-d');

        $startDate = Carbon::createFromFormat('Y-m-d', $daily)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $daily)->endOfDay();

        return view('dashbord.dashbordtem', [
            'total_empolyee' => User::where('role', 'empolyees')->count(),
            'empolyees' => empolyeereport::whereBetween('created_at', [$startDate, $endDate])->get(),
            'adminriports' => adminriports::whereBetween('created_at', [$startDate, $endDate])->get(),

        ]);
    }

    public function daily()
    {
        $login_user = Auth::user();
        $compony_name = Auth::user()->compony_name;

        if ($login_user->role == 'empolyees') {
            $empolyees_reports = empolyeereport::where('company', $compony_name)->latest()->paginate(30);
            $componies = comopany::where('compony_name', $compony_name)->get();
        } else {
            $empolyees_reports = empolyeereport::latest()->paginate(30);
            $componies = comopany::all();
        }

        // $empolyees =empolyeereport::latest()->paginate(30);
        // $empolyeereport_onlyTrashed = empolyeereport::onlyTrashed()->get();

        return view('dashbord.showdailyreport', compact('empolyees_reports', 'componies'));
    }

    public function filter(Request $request)
    {

        $empolyees_reports = empolyeereport::when($request->filled('form_date') && $request->filled('to_daate'), function ($query) {
            return $query->whereBetween('created_at', [request()->form_date, request()->to_date]);
        })->when($request->filled('company'), function ($query) {
            return   $query->where('company', request()->company);
        })->get();

        return view('dashbord.showsearchresult', compact('empolyees_reports'));

    }
}
