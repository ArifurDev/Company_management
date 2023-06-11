<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billdate extends Model
{
    use HasFactory;
    protected $fillable = [
        'house_rent',
        'gard_bill',
        'company_name',
        'company_id',
        'electricity_bill',
        'sewerage_bill',
        'water_bill',
        'fewa_bill',
        'wifi_bill',
        'a',
        'b',
        'c',
        'empolyee',
    ];
}
