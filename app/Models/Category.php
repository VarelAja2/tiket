<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Relationship dengan events
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    // Scope untuk kategori aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Attribute untuk count events
    public function getEventsCountAttribute()
    {
        return $this->events()->count();
    }

    // Format warna dengan opacity
    public function getColorWithOpacityAttribute($opacity = '20')
    {
        if (!$this->color) return '#f3f4f6';
        return $this->color . $opacity;
    }
}
