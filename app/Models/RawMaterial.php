<?php

namespace App\Models;

use App\Helpers\WeightFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'stock_gram',
        'min_stock_gram',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'stock_gram' => 'integer',
            'min_stock_gram' => 'integer',
        ];
    }

    public function getFormattedStockAttribute(): string
    {
        return WeightFormatter::format($this->stock_gram);
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function productions(): HasMany
    {
        return $this->hasMany(Production::class);
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class, 'item_id')->where('item_type', 'raw_material');
    }
}
