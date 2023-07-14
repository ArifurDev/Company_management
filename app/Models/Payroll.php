<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable =[
        'email',
        'company',
        'Amount',
        'due',
        'bank_name',
        'banck_account_number',
        'salary',
        'payment_date',
        'month',
        'year',
        'payment_method',
        'payment_type',
        'status'
    ];
}
