<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empolyeeinfo extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'salary_raised',
        'salary_receivable',
        'loan_taken',
        'loan_repaid',
        'visa_url',
        'password',
        'bank_name',
        'bank_account_number',
        'exchange_name',
        'exchange_account_number',
        'bank_card_number',
        'Pin',
        'online_transfer_Password',
        'a',
        'b',
        'c',
        'd',
        'e',
        'email',
        'empolyee_salary'
    ];
}
