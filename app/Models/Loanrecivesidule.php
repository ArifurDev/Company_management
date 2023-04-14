<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loanrecivesidule extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable =[
        'name',
        'email',
        'amount',
        'amount_due',
        'installment',
        'payment_date'
    ];
}
