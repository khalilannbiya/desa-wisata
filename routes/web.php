<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ArticleController;

Route::get('/galeri', function () {
    return view('components.pages.frontend.gallery');
});

Route::get('/artikel', function () {
    return view('components.pages.frontend.article');
});
Route::get('/detail-artikel', function () {
    return view('components.pages.frontend.detail-article');
});

Route::get('/event-detail', function () {
    return view('components.pages.frontend.detail-event');
});


Route::get('/event/create', function () {
    return view('components.pages.dashboard.writer.add');
});

Route::get('/events', [FrontendController::class, 'events'])->name('events');
Route::get('/events/{slug}/show', [EventController::class, 'show'])->name('events.show');
Route::view('/about-us', 'components.pages.frontend.about-us-page')->name('about-us');

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/destinations', [FrontendController::class, 'destinations'])->name('destinations');
Route::get('/destinations/{slug}/show', [DestinationController::class, 'show'])->middleware('check.destination.active')->name('destinations.show');

Route::middleware([
    'auth',
    'verified'
])->group(function () {

    // Super Admin
    Route::middleware([
        'role:super_admin'
    ])->name('super_admin.')->prefix('super-admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('components.pages.dashboard.index');
        })->name('dashboard');

        Route::resource('events', EventController::class)->except([
            'show'
        ]);

        Route::post('/destinations/{destination}/galleries', [DestinationController::class, 'addGalleries'])->name('destinations.addGalleries');
        Route::post('/destinations/{destination}/facility', [DestinationController::class, 'storeFacility'])->name('destinations.storeFacility');
        Route::post('/destinations/{destination}/accommodation', [DestinationController::class, 'storeAccommodation'])->name('destinations.storeAccommodation');
        Route::put('/destinations/{destination}/operational', [DestinationController::class, 'updateOperational'])->name('destinations.updateOperational');
        Route::put('/destinations/{destination}/contact', [DestinationController::class, 'updateContactDetail'])->name('destinations.updateContactDetail');
        Route::delete('/destinations/{destination}/galleries/{gallery}', [DestinationController::class, 'destroyGallery'])->name('destinations.destroyGallery');
        Route::delete('/destinations/{destination}/facilities/{facility}', [DestinationController::class, 'destroyFacility'])->name('destinations.destroyFacility');
        Route::delete('/destinations/{destination}/accommodations/{accommodation}', [DestinationController::class, 'destroyAccommodation'])->name('destinations.destroyAccommodation');
        Route::resource('destinations', DestinationController::class)->except([
            'show'
        ]);

        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('prevent.superadmin.edit')->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->middleware('prevent.superadmin.update')->name('users.update');
        Route::post('/users', [UserController::class, 'store'])->middleware('prevent.superadmin.create')->name('users.store');
        Route::resource('users', UserController::class)->except([
            'show', 'edit', 'update', 'store'
        ]);

        Route::resource('articles', ArticleController::class)->except([
            'show'
        ]);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Admin
    Route::middleware([
        'role:admin'
    ])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('components.pages.dashboard.index');
        })->name('dashboard');

        Route::resource('events', EventController::class)->except([
            'show'
        ]);

        Route::post('/destinations/{destination}/galleries', [DestinationController::class, 'addGalleries'])->name('destinations.addGalleries');
        Route::post('/destinations/{destination}/facility', [DestinationController::class, 'storeFacility'])->name('destinations.storeFacility');
        Route::post('/destinations/{destination}/accommodation', [DestinationController::class, 'storeAccommodation'])->name('destinations.storeAccommodation');
        Route::put('/destinations/{destination}/operational', [DestinationController::class, 'updateOperational'])->name('destinations.updateOperational');
        Route::put('/destinations/{destination}/contact', [DestinationController::class, 'updateContactDetail'])->name('destinations.updateContactDetail');
        Route::delete('/destinations/{destination}/galleries/{gallery}', [DestinationController::class, 'destroyGallery'])->name('destinations.destroyGallery');
        Route::delete('/destinations/{destination}/facilities/{facility}', [DestinationController::class, 'destroyFacility'])->name('destinations.destroyFacility');
        Route::delete('/destinations/{destination}/accommodations/{accommodation}', [DestinationController::class, 'destroyAccommodation'])->name('destinations.destroyAccommodation');
        Route::resource('destinations', DestinationController::class)->except([
            'show'
        ]);

        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('prevent.superadmin.edit')->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->middleware('prevent.superadmin.update')->name('users.update');
        Route::post('/users', [UserController::class, 'store'])->middleware('prevent.superadmin.create')->name('users.store');
        Route::resource('users', UserController::class)->except([
            'show', 'edit', 'update', 'store'
        ]);


        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // owner
    Route::middleware([
        'role:owner'
    ])->name('owner.')->prefix('owner')->group(function () {
        Route::get('/dashboard', function () {
            return view('components.pages.dashboard.index');
        })->name('dashboard');

        Route::post('/destinations/{destination}/galleries', [DestinationController::class, 'addGalleries'])->name('destinations.addGalleries');
        Route::post('/destinations/{destination}/facility', [DestinationController::class, 'storeFacility'])->name('destinations.storeFacility');
        Route::post('/destinations/{destination}/accommodation', [DestinationController::class, 'storeAccommodation'])->name('destinations.storeAccommodation');
        Route::put('/destinations/{destination}/operational', [DestinationController::class, 'updateOperational'])->name('destinations.updateOperational');
        Route::put('/destinations/{destination}/contact', [DestinationController::class, 'updateContactDetail'])->name('destinations.updateContactDetail');
        Route::delete('/destinations/{destination}/galleries/{gallery}', [DestinationController::class, 'destroyGallery'])->name('destinations.destroyGallery');
        Route::delete('/destinations/{destination}/facilities/{facility}', [DestinationController::class, 'destroyFacility'])->name('destinations.destroyFacility');
        Route::delete('/destinations/{destination}/accommodations/{accommodation}', [DestinationController::class, 'destroyAccommodation'])->name('destinations.destroyAccommodation');
        Route::resource('destinations', DestinationController::class)->except([
            'show'
        ]);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Writer
    Route::middleware([
        'role:writer'
    ])->name('writer.')->prefix('writer')->group(function () {
        Route::get('/dashboard', function () {
            return view('components.pages.dashboard.index');
        })->name('dashboard');


        Route::resource('articles', ArticleController::class)->except([
            'show'
        ]);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
