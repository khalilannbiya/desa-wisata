<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/update', function () {
    return view('components.pages.dashboard.owner.update');
});

Route::post('/update', function (Request $request) {
    dd($request->all());
})->name('update');


Route::post('/add', function (Request $request) {
    dd($request->all());

})->name('posts');

Route::get('/add',function (){
    return view('components.pages.dashboard.owner.add');
});


require __DIR__.'/auth.php';
