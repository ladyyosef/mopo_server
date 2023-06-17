<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Send extends Model
{
    use HasFactory;



    protected $fillable = [
        'account_number',
        'currency_id',
        'email',
        'quantity',
    ];


    protected $casts = [
        'id' => 'integer',
        'account_number' => 'integer',
        'currency_id' => 'integer',
        'quantity' => 'double',
    ];

   public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class,'account_number');
    }
}
