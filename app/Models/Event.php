<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'image_url',
        'category_id',
        'rating',
        'age_rating',
        'duration',
        'release_year',
        'event_date',
        'event_time',
        'location',
        'price',
        'discount_price',
        'is_coming_soon',
        'is_featured',
        'is_active',
        'total_seats',
        'available_seats',
        'promo_code',
        'promo_discount',
        'promo_valid_until'
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'event_date' => 'date',
        'is_coming_soon' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'total_seats' => 'integer',
        'available_seats' => 'integer',
        'promo_discount' => 'integer',
        'promo_valid_until' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });

        static::updating(function ($event) {
            if ($event->isDirty('title')) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function organizer()
    {
        return $this->belongsTo(EventOrganizer::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'event_genre');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getIsDiscountedAttribute()
    {
        return !is_null($this->discount_price) && $this->discount_price > 0;
    }

    public function getDiscountedPriceAttribute()
    {
        return $this->discount_price ?? $this->price;
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getFormattedDiscountPriceAttribute()
    {
        return 'Rp ' . number_format($this->discount_price, 0, ',', '.');
    }

    public function getDiscountPercentageAttribute()
    {
        if (!$this->is_discounted) return 0;

        return round((($this->price - $this->discount_price) / $this->price) * 100);
    }
}
