<?php

namespace App\Exports;

use App\Models\adminriports;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminreportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return adminriports::all();
    }
}
