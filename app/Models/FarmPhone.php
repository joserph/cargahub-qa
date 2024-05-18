<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmPhone extends Model
{
    use HasFactory;

    protected $fillable = [
        'farm_id',
        'phone',
    ];
}
