<?php

namespace App\Models;

use App\Helpers\WeightFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Production extends Model
{
    use HasFactory;

    protected $fillable = [
        'production_number',
        'production_date',
        'raw_material_id',
        'finished_product_id',
        'pack_quantity',
        'weight_per_pack_gram',
        'total_raw_used_gram',
        'notes',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'production_date' => 'date',
            'pack_quantity' => 'integer',
            'weight_per_pack_gram' => 'integer',
            'total_raw_used_gram' => 'integer',
        ];
    }

    public function getFormattedRawUsedAttribute(): string
    {
        return WeightFormatter::format($this->total_raw_used_gram);
    }

    public function rawMaterial(): BelongsTo
    {
        return $this->belongsTo(RawMaterial::class);
    }

    public function finishedProduct(): BelongsTo
    {
        return $this->belongsTo(FinishedProduct::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
