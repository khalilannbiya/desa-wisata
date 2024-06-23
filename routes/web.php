<?php

use App\Http\Controllers\ContactDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\OpeningHourController;
use App\Http\Controllers\GalleryController;


Route::get('/', function () {
    return view('components.pages.frontend.index');
});
Route::get('/wisata', function () {
    return view('components.pages.frontend.destination');
});

Route::get('/edit ', function () {
    return view('edit');
});

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

        Route::resource('destinations', DestinationController::class)->except([
            'show'
        ]);

        Route::resource('users', UserController::class)->except([
            'show'
        ]);
    });

    // Admin
    Route::middleware([
        'role:admin'
    ])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('destinations', DestinationController::class)->except([
            'show'
        ]);

        Route::resource('users', UserController::class)->except([
            'show'
        ]);
    });

    // owner
    Route::middleware([
        'role:owner'
    ])->name('owner.')->prefix('owner')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('destinations', DestinationController::class)->except([
            'show'
        ]);

        Route::resource('contact', ContactDetailController::class)->only([
            'update'
        ]);

        Route::resource('openingHour', OpeningHourController::class)->only([
            'update'
        ]);

        Route::resource('facility', FacilityController::class)->only([
            'store',
            'destroy'
        ]);

        Route::resource('accommodation', AccommodationController::class)->only([
            'store',
            'destroy'
        ]);

        Route::resource('gallery', GalleryController::class)->only([
            'store',
            'destroy'
        ]);

    });

    // Super Admin
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

require __DIR__ . '/auth.php';
