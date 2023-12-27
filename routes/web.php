<?php

use App\Http\Controllers\User\PurchaseController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\GuestItemController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ProfileInfoController;
use App\Http\Controllers\User\ThanksController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('guest.top');
});

    Route::get('/dashboard', [GuestItemController::class, 'top'])->name('items.top');
    Route::get('index/{primary_category}', [GuestItemController::class, 'primaryIndex'])->name('items.index');
    Route::get('index', [GuestItemController::class, 'index'])->name('items.index');
    Route::get('show/{item}/{option}', [GuestItemController::class, 'show'])->name('items.show');
    Route::get('more/{item}/{color}/{capacity}', [GuestItemController::class, 'more'])->name('items.more');

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
