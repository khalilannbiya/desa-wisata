<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DestinationController;

Route::get('/detail ', function () {
    return view('components.pages.frontend.detail-destination');
});

Route::get('/galeri', function () {
    return view('components.pages.frontend.gallery');
});

Route::get('/artikel', function () {
    return view('components.pages.frontend.article');
});
Route::get('/detail-artikel', function () {
    return view('components.pages.frontend.detail-article');
});

Route::get('/event', function () {
    return view('components.pages.frontend.event');
});


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/destinations', [FrontendController::class, 'destinations'])->name('destinations');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware([
    'auth',
    'verified'
])->group(function () {

    // Super Admin
    Route::middleware([
        'role:super_admin'
    ])->name('super_admin.')->prefix('super-admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
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

        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('prevent.superadmin.edit')->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->middleware('prevent.superadmin.update')->name('users.update');
        Route::post('/users', [UserController::class, 'store'])->middleware('prevent.superadmin.create')->name('users.store');
        Route::resource('users', UserController::class)->except([
            'show', 'edit', 'update', 'store'
        ]);
    });

    // Admin
    Route::middleware([
        'role:admin'
    ])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
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

        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('prevent.superadmin.edit')->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->middleware('prevent.superadmin.update')->name('users.update');
        Route::post('/users', [UserController::class, 'store'])->middleware('prevent.superadmin.create')->name('users.store');
        Route::resource('users', UserController::class)->except([
            'show', 'edit', 'update', 'store'
        ]);
    });

    // owner
    Route::middleware([
        'role:owner'
    ])->name('owner.')->prefix('owner')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
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
    });

    // Writer
    Route::middleware([
        'role:writer'
    ])->name('writer.')->prefix('writer')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
});

Route::get('/home', function () {
    return view('components.pages.frontend.index');
});

Route::get('/aboutus', function () {
    return view('components.pages.frontend.about-us-page');
});

require __DIR__ . '/auth.php';
