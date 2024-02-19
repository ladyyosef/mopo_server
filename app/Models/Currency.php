<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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


    protected function  logo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => request()->expectsJson() ? asset('storage/' . $value) : $value,
        );
    }

    public static function trending($perPage = 100, $priceCount = 0, $search = false)
    {
        $query = Currency::withCount('sends')
            ->withCount('trades')
            ->withCount('buys');
        if ($priceCount) {
            $query = $query->with('prices', fn ($query) => $query->orderBy('id', 'desc'));
        }
        if ($search) {
            $query = $query->whereRaw('LOWER(Currency_name) LIKE (?)', ['%' . $search . '%']);
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
        return $this->hasMany(Buy::class);
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Currencyprice::class);
    }
}
