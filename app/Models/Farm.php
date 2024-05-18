<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'tradename',
        'ruc',
        'address',
        'state_id',
        'city_id',
        'country_id',
        // 'phone',
        // 'cell_phone',
        // 'email',
        'agroquality_code',
        'status'
    ];

    protected $casts = [
        'status' => Status::class
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function phones(): HasMany
    {
        return $this->hasMany(FarmPhone::class);
    }
    public function emails(): HasMany
    {
        return $this->hasMany(FarmEmail::class);
    }
}
