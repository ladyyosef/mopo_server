<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id_in',
        'user_id_out',
        'currency_id_in',
        'currency_id_out',
        'quantity_in',
        'status',
        'quantity_out',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id_in' => 'integer',
        'user_id_out' => 'integer',
        'currency_id_in' => 'integer',
        'currency_id_out' => 'integer',
        'quantity_in' => 'integer',
        'status' => 'boolean',
        'quantity_out' => 'double',
    ];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id_in');
    }

    public function currencyOut(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id_out');
    }

    public function userIn(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_in');
    }

    public function userOut(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_in');
    }
}
