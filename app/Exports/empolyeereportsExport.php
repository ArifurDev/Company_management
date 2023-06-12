<?php

namespace App\Exports;

use App\Models\empolyeereport;
use Maatwebsite\Excel\Concerns\FromCollection;

class empolyeereportsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function collection()
     {
        $this_month = now()->format('m');

        return empolyeereport::whereMonth('created_at', $this_month)->get();
        //  return empolyeereport::all();
     }

}
