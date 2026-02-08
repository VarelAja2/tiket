<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\EventController;
use App\Http\Controllers\Guest\PromoController;
use App\Http\Controllers\Guest\CinemaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BannerController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home Page with Controller (NEW - DYNAMIC)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Backup route for testing - tetap pertahankan yang lama
Route::get('/home-static', function () {
    return view('guest.home');
})->name('home.static');

Route::get('/now-playing', function () {
    return view('guest.now-playing');
})->name('now-playing');

// Dynamic Now Playing (NEW)
Route::get('/now-playing-dynamic', [HomeController::class, 'nowPlaying'])->name('now-playing.dynamic');

Route::get('/coming-soon', function () {
    return view('guest.coming-soon');
})->name('coming-soon');

// Dynamic Coming Soon (NEW)
Route::get('/coming-soon-dynamic', [HomeController::class, 'comingSoon'])->name('coming-soon.dynamic');

Route::get('/cinemas', function () {
    return view('guest.cinemas');
})->name('cinemas');

// Dynamic Cinemas (NEW)
Route::get('/cinemas-dynamic', [CinemaController::class, 'index'])->name('cinemas.dynamic');

Route::get('/promo', function () {
    return view('guest.promo');
})->name('promo');

// Dynamic Promo (NEW)
Route::get('/promo-dynamic', [PromoController::class, 'index'])->name('promo.dynamic');

Route::get('/film/{slug}', function ($slug) {
    return view('guest.film.detail');
})->name('film.detail');

// Dynamic Event Detail (NEW)
Route::get('/event/{slug}', [EventController::class, 'show'])->name('event.show');

Route::get('/cinema/{id}', function ($id) {
    return view('guest.cinema.detail');
})->name('cinema.detail');

Route::get('/ticket/{id}', function ($id) {
    return view('guest.ticket.detail');
})->middleware('auth')->name('ticket.detail');

// Event Detail Routes (KEEP EXISTING)
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

Route::get('/wishlist', function () {
    return view('guest.wishlist.index');
})->name('wishlist.index');

// Search
Route::get('/search', function () {
    return view('guest.search');
})->name('search');

// FAQ & Help
Route::get('/faq', function () {
    return view('guest.faq');
})->name('faq');

Route::get('/help', function () {
    return view('guest.help');
})->name('help');

Route::get('/contact', function () {
    return view('guest.contact');
})->name('contact');

// Terms & Privacy
Route::get('/terms', function () {
    return view('guest.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('guest.privacy');
})->name('privacy');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (User)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        Route::get('/profile', function () {
            return view('user.profile');
        })->name('profile');

        Route::get('/wishlist', function () {
            return view('user.wishlist');
        })->name('wishlist');

        Route::get('/history', function () {
            return view('user.history');
        })->name('history');
    });

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

    Route::get('/history', function () {
        return view('user.history');
    })->name('history');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (UPDATE - TAMBAH ROUTES BARU)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard (KEEP EXISTING)
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // NEW: Banner Management
        Route::prefix('banners')->name('banners.')->group(function () {
            Route::get('/', [HomeContentController::class, 'bannerIndex'])->name('index');
            Route::get('/create', [HomeContentController::class, 'bannerCreate'])->name('create');
            Route::post('/', [HomeContentController::class, 'bannerStore'])->name('store');
            Route::get('/{banner}/edit', [HomeContentController::class, 'bannerEdit'])->name('edit');
            Route::put('/{banner}', [HomeContentController::class, 'bannerUpdate'])->name('update');
            Route::delete('/{banner}', [HomeContentController::class, 'bannerDestroy'])->name('destroy');
        });

        // NEW: Event Management
        Route::prefix('events')->name('events.')->group(function () {
            Route::get('/', [AdminEventController::class, 'index'])->name('index');
            Route::get('/create', [AdminEventController::class, 'create'])->name('create');
            Route::post('/', [AdminEventController::class, 'store'])->name('store');
            Route::get('/{event}/edit', [AdminEventController::class, 'edit'])->name('edit');
            Route::put('/{event}', [AdminEventController::class, 'update'])->name('update');
            Route::delete('/{event}', [AdminEventController::class, 'destroy'])->name('destroy');
        });

        // route kategori
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        // route promo
        Route::prefix('promos')->name('promos.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\PromoController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\PromoController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\PromoController::class, 'store'])->name('store');
            Route::get('/{promo}/edit', [App\Http\Controllers\Admin\PromoController::class, 'edit'])->name('edit');
            Route::put('/{promo}', [App\Http\Controllers\Admin\PromoController::class, 'update'])->name('update');
            Route::put('/{promo}/toggle-status', [App\Http\Controllers\Admin\PromoController::class, 'toggleStatus'])->name('toggle-status');
            Route::delete('/{promo}', [App\Http\Controllers\Admin\PromoController::class, 'destroy'])->name('destroy');
        });

        // route bookings
        Route::prefix('bookings')->name('bookings.')->group(function () {
            Route::get('/', [BookingController::class, 'index'])->name('index');
            Route::get('/statistics', [BookingController::class, 'statistics'])->name('statistics');
            Route::get('/export', [BookingController::class, 'export'])->name('export');
            Route::get('/{booking}', [BookingController::class, 'show'])->name('show');
            Route::put('/{booking}/status', [BookingController::class, 'updateStatus'])->name('update-status');
            Route::delete('/{booking}', [BookingController::class, 'destroy'])->name('destroy');
        });

        // KEEP EXISTING ADMIN ROUTES
        Route::get('/film', function () {
            return view('admin.film.index');
        })->name('film.index');

        Route::get('/film/create', function () {
            return view('admin.film.create');
        })->name('film.create');

        Route::get('/film/{id}/edit', function ($id) {
            return view('admin.film.edit');
        })->name('film.edit');

        Route::get('/showtimes', function () {
            return view('admin.showtimes.index');
        })->name('showtimes.index');

        Route::get('/showtimes/create', function () {
            return view('admin.showtimes.create');
        })->name('showtimes.create');

        Route::get('/cinemas', function () {
            return view('admin.cinemas.index');
        })->name('cinemas.index');

        Route::get('/promos', function () {
            return view('admin.promos.index');
        })->name('promos.index');

        Route::get('/orders', function () {
            return view('admin.orders.index');
        })->name('orders.index');

        //Route::get('/users', function () {
        //    return view('admin.users.index');
        //})->name('users.index');
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('/{user}', [UserController::class, 'show'])->name('show');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
            Route::put('/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('toggle-status');
            Route::put('/{user}/verify-email', [UserController::class, 'verifyEmail'])->name('verify-email');
        });
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
| Payment Callback Routes
|--------------------------------------------------------------------------
*/

Route::post('/payment/callback', [OrderController::class, 'callback'])
    ->name('payment.callback');

require __DIR__ . '/auth.php';
