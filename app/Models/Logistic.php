<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logistic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'ruc',
        // 'phone',
        'address',
        'state_id',
        'city_id',
        'country_id',
        // 'email',
        'image_url',
    ];
    // protected $casts = [
    //     'address' => 'array',
    // ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function phones(): HasMany
    {
        return $this->hasMany(LogisticPhone::class);
    }
    public function emails(): HasMany
    {
        return $this->hasMany(LogisticEmail::class);
    }
}
