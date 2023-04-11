<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comopany extends Model
{
    use HasFactory;

    protected $fillable = [
        'compony_name',
    ];
}
