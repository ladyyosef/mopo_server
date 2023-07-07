<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_number',
        'currency_id_in',
        'currency_id_out',
        'price',
        'Status',
        'quantity',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'account_number' => 'integer',
        'currency_id_in' => 'integer',
        'currency_id_out' => 'integer',
        'price' => 'integer',
        'Status' => 'boolean',
        'quantity' => 'double',
    ];

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }


    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id_in');
    }
    public function currencyOut(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id_out');
    }
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_number');
    }
}
