<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'discount_percentage',
        'promo_code',
        'valid_from',
        'valid_until',
        'usage_limit',
        'used_count',
        'is_active',
        'min_purchase',
        'max_discount',
        'applicable_events'
    ];

    protected $casts = [
        'discount_percentage' => 'integer',
        'usage_limit' => 'integer',
        'used_count' => 'integer',
        'is_active' => 'boolean',
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
        'min_purchase' => 'decimal:2',
        'max_discount' => 'decimal:2',
        'applicable_events' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where('valid_from', '<=', now())
            ->where('valid_until', '>=', now())
            ->where(function ($q) {
                $q->whereNull('usage_limit')
                    ->orWhereRaw('used_count < usage_limit');
            });
    }

    public function getIsValidAttribute()
    {
        return $this->is_active
            && now()->between($this->valid_from, $this->valid_until)
            && ($this->usage_limit === null || $this->used_count < $this->usage_limit);
    }
}
