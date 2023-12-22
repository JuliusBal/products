<?php

namespace App\Models;

use App\Traits\PriceFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory, PriceFormatter;

    protected $fillable = [
        'manufacturer_id',
        'name',
        'price',
        'available'
    ];

    protected $casts = [
        'price'     => 'float',
        'available' => 'boolean',
    ];

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    protected function getPriceAttribute(float $value): string
    {
        return $this->formatPrice($value);
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")
            ->orWhereHas('manufacturer', function ($manufacturers) use ($value) {
                $manufacturers->where('name', 'like', "%{$value}%");
            });
    }
}
