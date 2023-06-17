<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transduction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_out',
        'User_in',
        'trade_id',
        'Wallet_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'User_out' => 'integer',
        'User_in' => 'integer',
        'trade_id' => 'integer',
        'Wallet_id'=>'integer',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function trade(): BelongsTo
    {
        return $this->belongsTo(Trade::class,'trade_id');
    }
    public function wallet(): HasMany
    {
        return $this->hasMany(Wallet::class);
    }
    public function userOut(): BelongsTo
    {
        return $this->belongsTo(User::class,'User_out');
    }

    public function userIn(): BelongsTo
    {
        return $this->belongsTo(User::class,'User_in');
    }


}
