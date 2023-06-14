<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empolyeereport extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'company',
        'compony_id',
        'empolyee',
        'incoming_card',
        'incoming_cash',
        'incoming',
        'outgoing',
        'cash',
        'note',
    ];
}
