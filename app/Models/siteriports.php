<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class siteriports extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'company',
        'email',
        'site_name',
        'url',
        'user_name',
        'user_id',
        'password',
        'verifi_code',
        'payment_date',
        'why_create',
        'number',
        'note',
        'card_holder_name',
        'card_number',
        'currency',
        'expairy_date',
        'bank_name',
        'bank_account_number',
        'exchange_name',
        'exchange_account_number',
        'bank_card_number',
        'Pin',
        'online_transfer_Password',
    ];
}
