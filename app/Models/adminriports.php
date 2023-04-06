<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class adminriports extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'house_rent',
        'gard_bill',
        'electricity_bill',
        'sewerage_bill',
        'expanse',
        'personal',
        'loan',
        'total'
    ];
}
