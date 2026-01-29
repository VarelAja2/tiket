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

// Event Detail Routes
Route::get('/event/seminar/{slug}', function ($slug) {
    return view('event.seminar.detail');
})->name('event.seminar.detail');

Route::get('/event/workshop/{slug}', function ($slug) {
    return view('event.workshop.detail');
})->name('event.workshop.detail');

Route::get('/event/konser/{slug}', function ($slug) {
    return view('event.konser.detail');
})->name('event.konser.detail');

Route::get('/booking/{event_id}/seats', function ($event_id) {
    return view('guest.booking.seats', ['event_id' => $event_id]);
})->name('booking.seats');

Route::get('/event/festival/{slug}', function ($slug) {
    return view('event.festival.detail', [
        'slug' => $slug,
        'event_id' => 'festival-' . str_replace('-', '', $slug)
    ]);
})->name('event.festival.detail');

Route::get('/booking/competition/{event_id}', function ($event_id) {
    return view('guest.booking.competition', ['event_id' => $event_id]);
})->name('competition.register');

// Perbaiki route kompetisi detail
Route::get('/event/kompetisi/{slug}', function ($slug) {
    return view('event.kompetisi.detail', [
        'slug' => $slug,
        'event_id' => 'kompetisi-' . str_replace('-', '', $slug)
    ]);
})->name('event.kompetisi.detail');

Route::get('/event/talk-show/{slug}', function ($slug) {
    return view('event.talk-show.detail', [
        'slug' => $slug,
        'event_id' => 'talkshow-' . str_replace('-', '', $slug)
    ]);
})->name('event.talk-show.detail');
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

require __DIR__ . '/auth.php';

Route::get('/', fn() => view('guest.home'))->name('home');
Route::get('/now-playing', fn() => view('guest.now-playing'))->name('now-playing');
Route::get('/coming-soon', fn() => view('guest.coming-soon'))->name('coming-soon');
Route::get('/cinemas', fn() => view('guest.cinemas'))->name('cinemas');
Route::get('/promo', fn() => view('guest.promo'))->name('promo');
Route::get('/film/{slug}', fn($slug) => view('guest.film.detail'))->name('film.detail');
Route::get('/cinema/{id}', fn($id) => view('guest.cinema.detail'))->name('cinema.detail');

Route::get('/search', fn() => view('guest.search'))->name('search');
Route::get('/faq', fn() => view('guest.faq'))->name('faq');
Route::get('/help', fn() => view('guest.help'))->name('help');
Route::get('/contact', fn() => view('guest.contact'))->name('contact');
Route::get('/terms', fn() => view('guest.terms'))->name('terms');
Route::get('/privacy', fn() => view('guest.privacy'))->name('privacy');

// /*
// |--------------------------------------------------------------------------
// | Authenticated Routes (User)
// |--------------------------------------------------------------------------
// */

Route::middleware('auth')->group(function () {

    //     // Dashboard & User Pages
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/my-tickets', fn() => view('user.my-tickets'))->name('my-tickets');
    Route::get('/my-profile', fn() => view('user.profile'))->name('my-profile');
    Route::get('/wishlist', fn() => view('user.wishlist'))->name('wishlist');
    Route::get('/history', fn() => view('user.history'))->name('history');

    //     // Ticket Detail
    Route::get('/ticket/{id}', fn($id) => view('guest.ticket.detail'))
        ->name('ticket.detail');

    // Profile (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Booking & Order Routes
    //     |--------------------------------------------------------------------------
    //     */

    Route::get('/booking/{showtime_id}/seats', fn($id) => view('booking.seats'))
        ->name('booking.seats');

    Route::get('/booking/{showtime_id}/confirm', fn($id) => view('booking.confirm'))
        ->name('booking.confirm');

    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{id}/pay', [OrderController::class, 'pay'])->name('order.pay');

    Route::get('/order/{id}/pending', fn($id) => view('order.pending'))->name('order.pending');
    Route::get('/order/{id}/success', fn($id) => view('order.success'))->name('order.success');
    Route::get('/order/{id}/failed', fn($id) => view('order.failed'))->name('order.failed');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

// /*
// |--------------------------------------------------------------------------
// | Admin Routes
// |--------------------------------------------------------------------------
// */

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/films', fn() => view('admin.films.index'))->name('films.index');
        Route::get('/films/create', fn() => view('admin.films.create'))->name('films.create');
        Route::get('/films/{id}/edit', fn($id) => view('admin.films.edit'))->name('films.edit');

        Route::get('/showtimes', fn() => view('admin.showtimes.index'))->name('showtimes.index');
        Route::get('/showtimes/create', fn() => view('admin.showtimes.create'))->name('showtimes.create');

        Route::get('/cinemas', fn() => view('admin.cinemas.index'))->name('cinemas.index');
        Route::get('/promos', fn() => view('admin.promos.index'))->name('promos.index');
        Route::get('/orders', fn() => view('admin.orders.index'))->name('orders.index');
        Route::get('/users', fn() => view('admin.users.index'))->name('users.index');
    });

// /*
// |--------------------------------------------------------------------------
// | Auth Routes (Laravel Breeze)
// |--------------------------------------------------------------------------
// */

require __DIR__ . '/auth.php';

// /*
// |--------------------------------------------------------------------------
// | Payment Callback (External)
// |--------------------------------------------------------------------------
// */

Route::post('/payment/callback', [OrderController::class, 'callback'])
    ->name('payment.callback');
