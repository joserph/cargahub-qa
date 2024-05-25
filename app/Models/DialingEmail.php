<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialingEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'dialing_id',
        'email',
    ];
}
