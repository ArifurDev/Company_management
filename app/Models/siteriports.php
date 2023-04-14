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
    ];
}
