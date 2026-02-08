<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code',
        'user_id',

        // data pembeli
        'buyer_name',
        'buyer_phone',
        'buyer_email',

        // relasi
        'event_id',

        // transaksi
        'qty',
        'price',
        'total_price',
        'payment_method',
        'status',
        'paid_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
