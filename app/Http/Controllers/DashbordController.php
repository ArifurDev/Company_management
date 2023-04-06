<?php

namespace App\Http\Controllers;

use App\Models\adminriports;
use App\Models\empolyee;
use App\Models\empolyeereport;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index()
    {
        $dt = new DateTime();
        $daily = $dt->format('Y-m-d');

        $startDate = Carbon::createFromFormat('Y-m-d', $daily)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $daily)->endOfDay();

        return view('dashbord.dashbordtem',[
            'total_empolyee' => User::where('role','empolyees')->count(),
            'empolyees' => empolyeereport::whereBetween('created_at', [$startDate, $endDate])->get(),
            'adminriports' => adminriports::whereBetween('created_at', [$startDate, $endDate])->get(),

        ]);
    }
    
}
