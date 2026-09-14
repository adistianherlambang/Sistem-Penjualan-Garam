<?php

namespace App\Models;

use App\Helpers\WeightFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'movement_date',
        'item_type', // 'raw_material' atau 'finished_product'
        'item_id',
        'transaction_type', // 'Barang Masuk', 'Produksi', 'Penjualan', 'Penyesuaian'
        'reference_number',
        'quantity_delta', // Positif atau negatif
        'unit', // 'gram' atau 'bungkus'
        'stock_before',
        'stock_after',
        'notes',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'movement_date' => 'datetime',
            'quantity_delta' => 'integer',
            'stock_before' => 'integer',
            'stock_after' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getItemNameAttribute(): string
    {
        if ($this->item_type === 'raw_material') {
            $item = RawMaterial::find($this->item_id);
            return $item ? $item->name : 'Barang Mentah #' . $this->item_id;
        } else {
            $item = FinishedProduct::find($this->item_id);
            return $item ? $item->name : 'Barang Jadi #' . $this->item_id;
        }
    }

    public function getFormattedDeltaAttribute(): string
    {
        $prefix = $this->quantity_delta > 0 ? '+' : '';

        if ($this->unit === 'gram') {
            $absFormatted = WeightFormatter::format(abs($this->quantity_delta));
            return $this->quantity_delta < 0 ? "-{$absFormatted}" : "+{$absFormatted}";
        }

        return "{$prefix}{$this->quantity_delta} bungkus";
    }
}
