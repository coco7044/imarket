<?php

use App\Http\Controllers\User\PurchaseController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ItemController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ProfileInfoController;



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
    return view('user.welcome');
});

Route::middleware('auth:users')->group(function(){
    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index');
    Route::get('cancel/{purchase_id}', [PurchaseController::class, 'cancel'])->name('purchase.cancel');
    Route::get('edit/{purchase_id}', [PurchaseController::class, 'edit'])->name('purchase.edit');

});

Route::middleware('auth:users')->group(function(){
    Route::get('/dashboard', [ItemController::class, 'top'])->name('items.top');
    Route::get('index/{primary_category}', [ItemController::class, 'primaryIndex'])->name('items.index');
    Route::get('index', [ItemController::class, 'index'])->name('items.index');
    Route::get('show/{item}', [ItemController::class, 'show'])->name('items.show');
});

Route::prefix('cart')->middleware('auth:users')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('add', [CartController::class, 'add'])->name('cart.add');   
    Route::post('delete/{item}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('checkoutInfo', [CartController::class, 'checkoutInfo'])->name('cart.checkoutInfo');
    Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('success', [CartController::class, 'success'])->name('cart.success');
    Route::get('cancel', [CartController::class, 'cancel'])->name('cart.cancel');
});

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profileInfo', [ProfileInfoController::class, 'index'])->name('profileInfo.index');
    Route::patch('/profileInfo', [ProfileInfoController::class, 'update'])->name('profileInfo.update');
    Route::delete('/profileInfo', [ProfileInfoController::class, 'destroy'])->name('profileInfo.destroy');
});


require __DIR__.'/auth.php';
