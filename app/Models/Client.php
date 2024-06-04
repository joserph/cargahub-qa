<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'tradename',
        'address',
        'state_id',
        'city_id',
        'zip_code',
        'country_id',
        // 'phone',
        // 'cell_phone',
        // 'email',
        'status'
    ];

    protected $casts = [
        'status' => Status::class
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function phones(): HasMany
    {
        return $this->hasMany(ClientPhone::class);
    }
    public function emails(): HasMany
    {
        return $this->hasMany(ClientEmail::class);
    }
}
