<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loandetaile extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'mainloan_id',
        'installment',
        'amount',
        'date',
        'status',
    ];
}
