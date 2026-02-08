<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventOrganizer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'website',
        'description',
        'logo',
        'cover_image',
        'address',
        'city',
        'province',
        'country',
        'contact_person',
        'contact_person_phone',
        'contact_person_email',
        'social_facebook',
        'social_twitter',
        'social_instagram',
        'social_linkedin',
        'is_active',
        'is_verified',
        'events_count',
        'rating',
        'review_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
        'events_count' => 'integer',
        'rating' => 'integer',
        'review_count' => 'integer',
    ];

    protected $appends = [
        'logo_url',
        'cover_image_url',
        'full_address',
        'average_rating',
    ];

    /**
     * Accessor for logo URL
     */
    public function getLogoUrlAttribute()
    {
        if (!$this->logo) {
            return asset('images/default-organizer-logo.png');
        }

        if (filter_var($this->logo, FILTER_VALIDATE_URL)) {
            return $this->logo;
        }

        return asset('storage/' . $this->logo);
    }

    /**
     * Accessor for cover image URL
     */
    public function getCoverImageUrlAttribute()
    {
        if (!$this->cover_image) {
            return asset('images/default-organizer-cover.jpg');
        }

        if (filter_var($this->cover_image, FILTER_VALIDATE_URL)) {
            return $this->cover_image;
        }

        return asset('storage/' . $this->cover_image);
    }

    /**
     * Accessor for full address
     */
    public function getFullAddressAttribute()
    {
        $parts = [];
        if ($this->address) $parts[] = $this->address;
        if ($this->city) $parts[] = $this->city;
        if ($this->province) $parts[] = $this->province;
        if ($this->country) $parts[] = $this->country;

        return implode(', ', $parts);
    }

    /**
     * Accessor for average rating
     */
    public function getAverageRatingAttribute()
    {
        if ($this->review_count == 0) return 0;
        return round($this->rating / $this->review_count, 1);
    }

    /**
     * Relationship with events
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Relationship with reviews
     */
    public function reviews()
    {
        return $this->hasMany(OrganizerReview::class);
    }

    /**
     * Scope for active organizers
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for verified organizers
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope for popular organizers (by events count)
     */
    public function scopePopular($query, $limit = 10)
    {
        return $query->orderBy('events_count', 'desc')->limit($limit);
    }

    /**
     * Scope for search
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('city', 'like', "%{$search}%");
        });
    }

    /**
     * Increment events count
     */
    public function incrementEventsCount()
    {
        $this->increment('events_count');
    }

    /**
     * Decrement events count
     */
    public function decrementEventsCount()
    {
        $this->decrement('events_count');
    }

    /**
     * Add a review rating
     */
    public function addReview($rating)
    {
        $this->increment('review_count');
        $this->increment('rating', $rating);
        $this->save();
    }

    /**
     * Update a review rating
     */
    public function updateReview($oldRating, $newRating)
    {
        $this->decrement('rating', $oldRating);
        $this->increment('rating', $newRating);
        $this->save();
    }

    /**
     * Remove a review rating
     */
    public function removeReview($rating)
    {
        $this->decrement('review_count');
        $this->decrement('rating', $rating);
        $this->save();
    }

    /**
     * Check if organizer has upcoming events
     */
    public function hasUpcomingEvents()
    {
        return $this->events()
            ->where('status', 'published')
            ->where('start_date', '>=', now())
            ->exists();
    }

    /**
     * Get upcoming events count
     */
    public function upcomingEventsCount()
    {
        return $this->events()
            ->where('status', 'published')
            ->where('start_date', '>=', now())
            ->count();
    }

    /**
     * Get past events count
     */
    public function pastEventsCount()
    {
        return $this->events()
            ->where('status', 'published')
            ->where('start_date', '<', now())
            ->count();
    }
}
