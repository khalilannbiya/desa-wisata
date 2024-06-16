<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/testStore', [DestinationController::class, 'testStore'])->name('testStore');

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
    });

    // owner
    Route::middleware([
        'role:owner'
    ])->name('owner.')->prefix('owner')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::resource('destinations', DestinationController::class);
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


Route::get('/add' , function () {
    return view('components.pages.dashboard.owner.add');
});

Route::post('/add', function (Request $request) {
    dd($request->all());

})->name('posts');


Route::get('/home', function () {
    return view('components.pages.frontend.index');
});

require __DIR__ . '/auth.php';
