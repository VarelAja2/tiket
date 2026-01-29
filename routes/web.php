<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('guest.home');
})->name('home');

Route::get('/now-playing', function () {
    return view('guest.now-playing');
})->name('now-playing');

Route::get('/coming-soon', function () {
    return view('guest.coming-soon');
})->name('coming-soon');

Route::get('/cinemas', function () {
    return view('guest.cinemas');
})->name('cinemas');

Route::get('/promo', function () {
    return view('guest.promo');
})->name('promo');

Route::get('/film/{slug}', function ($slug) {
    return view('guest.film.detail');
})->name('film.detail');

Route::get('/cinema/{id}', function ($id) {
    return view('guest.cinema.detail');
})->name('cinema.detail');

Route::get('/ticket/{id}', function ($id) {
    return view('guest.ticket.detail');
})->middleware('auth')->name('ticket.detail');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (User)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/my-tickets', function () {
    return view('user.my-tickets');
})->middleware(['auth'])->name('my-tickets');

Route::get('/my-profile', function () {
    return view('user.profile');
})->middleware(['auth'])->name('my-profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Wishlist
    Route::get('/wishlist', function () {
        return view('user.wishlist');
    })->name('wishlist');

    // History
    Route::get('/history', function () {
        return view('user.history');
    })->name('history');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Films Management
    Route::get('/films', function () {
        return view('admin.films.index');
    })->name('films.index');

    Route::get('/films/create', function () {
        return view('admin.films.create');
    })->name('films.create');

    Route::get('/films/{id}/edit', function ($id) {
        return view('admin.films.edit');
    })->name('films.edit');

    // Showtimes Management
    Route::get('/showtimes', function () {
        return view('admin.showtimes.index');
    })->name('showtimes.index');

    Route::get('/showtimes/create', function () {
        return view('admin.showtimes.create');
    })->name('showtimes.create');

    // Cinemas Management
    Route::get('/cinemas', function () {
        return view('admin.cinemas.index');
    })->name('cinemas.index');

    // Promo Management
    Route::get('/promos', function () {
        return view('admin.promos.index');
    })->name('promos.index');

    // Orders Management
    Route::get('/orders', function () {
        return view('admin.orders.index');
    })->name('orders.index');

    // Users Management
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users.index');
});

/*
|--------------------------------------------------------------------------
| Order Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Seat Selection
    Route::get('/booking/{showtime_id}/seats', function ($showtime_id) {
        return view('booking.seats');
    })->name('booking.seats');

    // Order Confirmation
    Route::get('/booking/{showtime_id}/confirm', function ($showtime_id) {
        return view('booking.confirm');
    })->name('booking.confirm');

    // Order Processing
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    // Payment
    Route::get('/order/{id}/pay', [OrderController::class, 'pay'])->name('order.pay');

    // Order Status Pages
    Route::get('/order/{id}/pending', fn($id) => view('order.pending'))->name('order.pending');
    Route::get('/order/{id}/success', fn($id) => view('order.success'))->name('order.success');
    Route::get('/order/{id}/failed', fn($id) => view('order.failed'))->name('order.failed');

    // Order History
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Payment Callback Routes
|--------------------------------------------------------------------------
*/

Route::post('/payment/callback', [OrderController::class, 'callback'])
    ->name('payment.callback');

/*
|--------------------------------------------------------------------------
| Search Routes
|--------------------------------------------------------------------------
*/

Route::get('/search', function () {
    return view('guest.search');
})->name('search');

/*
|--------------------------------------------------------------------------
| FAQ & Help Routes
|--------------------------------------------------------------------------
*/

Route::get('/faq', function () {
    return view('guest.faq');
})->name('faq');

Route::get('/help', function () {
    return view('guest.help');
})->name('help');

Route::get('/contact', function () {
    return view('guest.contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| Terms & Conditions Routes
|--------------------------------------------------------------------------
*/

Route::get('/terms', function () {
    return view('guest.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('guest.privacy');
})->name('privacy');
