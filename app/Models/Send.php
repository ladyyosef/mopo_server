<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Send extends Model
{
    use HasFactory;



    protected $fillable = [
        'user_id',
        'currency_id',
        'to_id',
        'quantity',
    ];


    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'currency_id' => 'integer',
        'to_id' => 'integer',
        'quantity' => 'double',
    ];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
