<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BestCurrency extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_id',
        'User_id',
    ];
    protected $casts = [
        'id' => 'integer',
        'currency_id' => 'integer',
        'User_id' => 'integer'


    ];
    public function currencies(): HasMany
    {
        return $this->hasMany(Currency::class);
    }
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class,'currency_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
