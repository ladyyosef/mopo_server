<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'logo',
        'Currency_name',
        'Abbrevation',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public static function trending($perPage = 100, $priceCount = 0)
    {
        $query = Currency::withCount('sends')
            ->withCount('trades')
            ->withCount('buys');
        if ($priceCount) {
            $query = $query->with('prices', fn ($query) => $query->limit($priceCount)->orderBy('id', 'desc'));
        }
        return $query
            ->limit($perPage)
            ->get()
            ->sortByDesc(fn ($curreny) => $curreny->sends_count + $curreny->trades_count + $curreny->buys_count)
            ->values()
            ->all();
    }

    public function sends(): HasMany
    {
        return $this->hasMany(Send::class);
    }

    public function trades(): HasMany
    {
        return $this->hasMany(Trade::class, 'currency_id_in');
    }

    public function buys(): HasMany
    {
        return $this->hasMany(Buy::class, 'currency_id_in');
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Currencyprice::class);
    }
}
