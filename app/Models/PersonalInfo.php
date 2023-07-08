<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $fillable = [
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
