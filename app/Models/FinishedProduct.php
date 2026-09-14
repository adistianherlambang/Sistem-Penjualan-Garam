<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FinishedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'weight_per_pack_gram',
        'stock_packs',
        'price_per_pack',
        'cost_per_pack',
        'min_stock_packs',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'weight_per_pack_gram' => 'integer',
            'stock_packs' => 'integer',
            'price_per_pack' => 'decimal:2',
            'cost_per_pack' => 'decimal:2',
            'min_stock_packs' => 'integer',
        ];
    }

    public function productions(): HasMany
    {
        return $this->hasMany(Production::class);
    }

    public function saleItems(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class, 'item_id')->where('item_type', 'finished_product');
    }
}
