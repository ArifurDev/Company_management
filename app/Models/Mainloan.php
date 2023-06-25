<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mainloan extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'image',
        'amount',
        'installment',
        'per_installment',
        'loan_type',
        'payment_date',
        'status',
    ];
}
