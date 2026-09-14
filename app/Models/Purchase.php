<?php

namespace App\Models;

use App\Helpers\WeightFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'purchase_date',
        'supplier_id',
        'raw_material_id',
        'weight_value',
        'weight_unit',
        'weight_in_gram',
        'price_per_unit',
        'total_price',
        'notes',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'purchase_date' => 'date',
            'weight_value' => 'decimal:3',
            'weight_in_gram' => 'integer',
            'price_per_unit' => 'decimal:2',
            'total_price' => 'decimal:2',
        ];
    }

    public function getFormattedWeightAttribute(): string
    {
        return WeightFormatter::format($this->weight_in_gram);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function rawMaterial(): BelongsTo
    {
        return $this->belongsTo(RawMaterial::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
