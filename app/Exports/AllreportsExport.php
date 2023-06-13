<?php

namespace App\Exports;

use App\Models\empolyeereport;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllreportsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return empolyeereport::all();
    }
}
