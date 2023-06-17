<?php

namespace App\Models;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Card_number',
        'Holder_Name',
        'Cvc',
        'Expire_Date',
        'Card_image',
        'Wallet_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Expire_Date' => 'date',
        'Wallet_id' => 'integer',
    ];



    public function wallet(): BelongsTo
    {
        return $this->belongsTo(wallet::class,'Wallet_id');
    }

}
