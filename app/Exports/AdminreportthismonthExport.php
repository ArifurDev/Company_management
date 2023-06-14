<?php

namespace App\Exports;

use App\Models\adminriports;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminreportthismonthExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $this_month = now()->format('m');

        return adminriports::whereMonth('created_at', $this_month)->get();
        return adminriports::all();
    }
}
