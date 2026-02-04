<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::active()->paginate(12);
        return view('guest.promo.index', compact('promos'));
    }
}
