<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'description',
        'icon',
        'color',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
        'is_featured',
        'sort_order',
        'events_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
        'events_count' => 'integer',
    ];

    protected $appends = [
        'icon_class',
        'image_url',
        'display_color',
    ];

    /**
     * Accessor for icon class (fallback to default based on type)
     */
    public function getIconClassAttribute()
    {
        if ($this->icon) {
            return $this->icon;
        }

        // Default icons based on type
        $icons = [
            'seminar' => 'fas fa-chalkboard-teacher',
            'workshop' => 'fas fa-tools',
            'konser' => 'fas fa-music',
            'festival' => 'fas fa-glass-cheers',
            'kompetisi' => 'fas fa-trophy',
            'talk_show' => 'fas fa-microphone',
            'general' => 'fas fa-calendar-alt',
        ];

        return $icons[$this->type] ?? 'fas fa-calendar-alt';
    }

    /**
     * Accessor for image URL
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            // Return default image based on type
            $defaultImages = [
                'seminar' => 'images/categories/seminar-default.jpg',
                'workshop' => 'images/categories/workshop-default.jpg',
                'konser' => 'images/categories/konser-default.jpg',
                'festival' => 'images/categories/festival-default.jpg',
                'kompetisi' => 'images/categories/kompetisi-default.jpg',
                'talk_show' => 'images/categories/talk-show-default.jpg',
                'general' => 'images/categories/general-default.jpg',
            ];

            $imagePath = $defaultImages[$this->type] ?? 'images/categories/default.jpg';
            return asset($imagePath);
        }

        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        return asset('storage/' . $this->image);
    }

    /**
     * Accessor for display color (with fallback)
     */
    public function getDisplayColorAttribute()
    {
        if ($this->color) {
            return $this->color;
        }

        // Default colors based on type
        $colors = [
            'seminar' => '#3b82f6', // blue
            'workshop' => '#8b5cf6', // purple
            'konser' => '#ef4444', // red
            'festival' => '#f59e0b', // yellow
            'kompetisi' => '#10b981', // green
            'talk_show' => '#ec4899', // pink
            'general' => '#6b7280', // gray
        ];

        return $colors[$this->type] ?? '#6b7280';
    }

    /**
     * Relationship with events
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Scope for active categories
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for featured categories
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for ordered categories
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    /**
     * Scope for categories by type
     */
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope for search
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    /**
     * Get events count with status filter
     */
    public function getEventsCountByStatus($status = 'published')
    {
        return $this->events()->where('status', $status)->count();
    }

    /**
     * Get upcoming events in this category
     */
    public function upcomingEvents($limit = 5)
    {
        return $this->events()
            ->where('status', 'published')
            ->where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get featured events in this category
     */
    public function featuredEvents($limit = 3)
    {
        return $this->events()
            ->where('status', 'published')
            ->where('is_featured', true)
            ->where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->limit($limit)
            ->get();
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
     * Check if category has events
     */
    public function hasEvents()
    {
        return $this->events_count > 0;
    }

    /**
     * Check if category has upcoming events
     */
    public function hasUpcomingEvents()
    {
        return $this->events()
            ->where('status', 'published')
            ->where('start_date', '>=', now())
            ->exists();
    }

    /**
     * Get the display name with icon
     */
    public function getDisplayName()
    {
        $icon = "<i class='{$this->icon_class}'></i>";
        return "{$icon} {$this->name}";
    }

    /**
     * Get type label
     */
    public function getTypeLabelAttribute()
    {
        $labels = [
            'seminar' => 'Seminar',
            'workshop' => 'Workshop',
            'konser' => 'Konser',
            'festival' => 'Festival',
            'kompetisi' => 'Kompetisi',
            'talk_show' => 'Talk Show',
            'general' => 'General',
        ];

        return $labels[$this->type] ?? ucfirst(str_replace('_', ' ', $this->type));
    }
}
