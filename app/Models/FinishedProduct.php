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
        'category',
        'weight_per_pack_gram',
        'packaging',
        'stock_packs',
        'price_per_pack',
        'cost_per_pack',
        'min_stock_packs',
        'notes',
        'image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'weight_per_pack_gram' => 'integer',
            'stock_packs' => 'integer',
            'price_per_pack' => 'decimal:2',
            'cost_per_pack' => 'decimal:2',
            'min_stock_packs' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function getImageUrlAttribute(): string
    {
        if (!empty($this->image)) {
            if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
                return $this->image;
            }
            if (str_starts_with($this->image, 'asset/')) {
                return asset($this->image);
            }
            return asset('storage/' . $this->image);
        }

        return asset('asset/images/ptgaram/product-1.jpg');
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
