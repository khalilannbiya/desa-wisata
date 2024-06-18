<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;

Route::get('/', function () {
    return view('components.pages.frontend.index');
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


require __DIR__ . '/auth.php';
