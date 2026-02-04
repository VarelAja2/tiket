<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'event_id',
        'seat_id',
        'ticket_code',
        'ticket_type',
        'price',
        'status',
        'used_at'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'used_at' => 'datetime'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    public function getIsUsedAttribute()
    {
        return !is_null($this->used_at);
    }
}
