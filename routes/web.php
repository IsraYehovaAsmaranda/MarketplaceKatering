<?php

use App\Http\Controllers\LoginKantorController;
use App\Http\Controllers\LoginKateringController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterKantorController;
use App\Http\Controllers\RegisterKateringController;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::resource('/', MainController::class);

// For Authentication
Route::resource('/logincustomer', LoginKantorController::class);

Route::resource('/loginmerchant', LoginKateringController::class);

Route::resource('/registercustomer', RegisterKantorController::class);

Route::resource('/registermerchant', RegisterKateringController::class);

// For Account Settings
Route::get('/account', function () {
    return view('pages.account.Account', ['user' => Auth::user()]);
})->middleware('loggedin');

Route::put('/account', [AccountController::class, 'changeInfo'])->name('account.changeinfo')->middleware('loggedin');

Route::put('/account/changepassword', [AccountController::class, 'changePassword'])->name('account.changepassword')->middleware('loggedin');

// For Getting Food Details
Route::get('/food/{food}', function (Food $food) {
    $food = Food::find($food);
    return dd($food);
});

// For Cart Menu
Route::get('/cart', function () {
    $user = Auth::user();
    $userId = $user->id;
    $cart = Cart::where('user_id', '=', $userId)->get();
    Log::info($cart);
    
    return view('cart', [
        'carts' => $cart
    ]);
})->middleware('iscustomer');

// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Successfully logged out');
})->middleware('loggedin');
