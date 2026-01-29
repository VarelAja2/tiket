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
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (User)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
});



/*
|--------------------------------------------------------------------------
| Order Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{id}/pay', [OrderController::class, 'pay'])->name('order.pay');
    Route::get('/order/{id}/pending', fn($id) => view('order.pending'))->name('order.pending');
    Route::get('/order/{id}/success', fn($id) => view('order.success'))->name('order.success');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

// ROUTE BARU
// <?php

// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\OrderController;
// use App\Http\Controllers\Admin\DashboardController;
// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | Public Routes (Guest)
// |--------------------------------------------------------------------------
// */

// Route::get('/', fn () => view('guest.home'))->name('home');
// Route::get('/now-playing', fn () => view('guest.now-playing'))->name('now-playing');
// Route::get('/coming-soon', fn () => view('guest.coming-soon'))->name('coming-soon');
// Route::get('/cinemas', fn () => view('guest.cinemas'))->name('cinemas');
// Route::get('/promo', fn () => view('guest.promo'))->name('promo');
// Route::get('/film/{slug}', fn ($slug) => view('guest.film.detail'))->name('film.detail');
// Route::get('/cinema/{id}', fn ($id) => view('guest.cinema.detail'))->name('cinema.detail');

// Route::get('/search', fn () => view('guest.search'))->name('search');
// Route::get('/faq', fn () => view('guest.faq'))->name('faq');
// Route::get('/help', fn () => view('guest.help'))->name('help');
// Route::get('/contact', fn () => view('guest.contact'))->name('contact');
// Route::get('/terms', fn () => view('guest.terms'))->name('terms');
// Route::get('/privacy', fn () => view('guest.privacy'))->name('privacy');

// /*
// |--------------------------------------------------------------------------
// | Authenticated Routes (User)
// |--------------------------------------------------------------------------
// */

// Route::middleware('auth')->group(function () {

//     // Dashboard & User Pages
//     Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
//     Route::get('/my-tickets', fn () => view('user.my-tickets'))->name('my-tickets');
//     Route::get('/my-profile', fn () => view('user.profile'))->name('my-profile');
//     Route::get('/wishlist', fn () => view('user.wishlist'))->name('wishlist');
//     Route::get('/history', fn () => view('user.history'))->name('history');

//     // Ticket Detail
//     Route::get('/ticket/{id}', fn ($id) => view('guest.ticket.detail'))
//         ->name('ticket.detail');

//     // Profile (Breeze)
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     /*
//     |--------------------------------------------------------------------------
//     | Booking & Order Routes
//     |--------------------------------------------------------------------------
//     */

//     Route::get('/booking/{showtime_id}/seats', fn ($id) => view('booking.seats'))
//         ->name('booking.seats');

//     Route::get('/booking/{showtime_id}/confirm', fn ($id) => view('booking.confirm'))
//         ->name('booking.confirm');

//     Route::post('/order', [OrderController::class, 'store'])->name('order.store');
//     Route::get('/order/{id}/pay', [OrderController::class, 'pay'])->name('order.pay');

//     Route::get('/order/{id}/pending', fn ($id) => view('order.pending'))->name('order.pending');
//     Route::get('/order/{id}/success', fn ($id) => view('order.success'))->name('order.success');
//     Route::get('/order/{id}/failed', fn ($id) => view('order.failed'))->name('order.failed');

//     Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
//     Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
// });

// /*
// |--------------------------------------------------------------------------
// | Admin Routes
// |--------------------------------------------------------------------------
// */

// Route::middleware(['auth', 'admin'])
//     ->prefix('admin')
//     ->name('admin.')
//     ->group(function () {

//         Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//         Route::get('/films', fn () => view('admin.films.index'))->name('films.index');
//         Route::get('/films/create', fn () => view('admin.films.create'))->name('films.create');
//         Route::get('/films/{id}/edit', fn ($id) => view('admin.films.edit'))->name('films.edit');

//         Route::get('/showtimes', fn () => view('admin.showtimes.index'))->name('showtimes.index');
//         Route::get('/showtimes/create', fn () => view('admin.showtimes.create'))->name('showtimes.create');

//         Route::get('/cinemas', fn () => view('admin.cinemas.index'))->name('cinemas.index');
//         Route::get('/promos', fn () => view('admin.promos.index'))->name('promos.index');
//         Route::get('/orders', fn () => view('admin.orders.index'))->name('orders.index');
//         Route::get('/users', fn () => view('admin.users.index'))->name('users.index');
//     });

// /*
// |--------------------------------------------------------------------------
// | Auth Routes (Laravel Breeze)
// |--------------------------------------------------------------------------
// */

// require __DIR__ . '/auth.php';

// /*
// |--------------------------------------------------------------------------
// | Payment Callback (External)
// |--------------------------------------------------------------------------
// */

// Route::post('/payment/callback', [OrderController::class, 'callback'])
//     ->name('payment.callback');


