<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\FoodMenuController;
use App\Http\Controllers\LoginKantorController;
use App\Http\Controllers\LoginKateringController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterKantorController;
use App\Http\Controllers\RegisterKateringController;
use App\Models\Food;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::resource('/', MainController::class);

// For Authentication
Route::resource('/logincustomer', LoginKantorController::class);

Route::resource('/loginmerchant', LoginKateringController::class);

Route::resource('/registercustomer', RegisterKantorController::class);

Route::resource('/registermerchant', RegisterKateringController::class);

// For Cart Menu
Route::resource('/cart', CartController::class)->middleware('iscustomer');

// For Checkout Menu
Route::post('/checkout', [CheckOutController::class, 'store'])->middleware('iscustomer');

// For Merchant's Menu
Route::resource('/menu', FoodMenuController::class)->middleware('ismerchant');

Route::put('/menu/{id}/togglestatus', [FoodMenuController::class, 'toggleStatus'])->name('foodmenu.togglestatus')->middleware('ismerchant');

// For Account Settings
Route::get('/account', function () {
    return view('pages.account.Account', ['user' => Auth::user()]);
})->middleware('loggedin');

Route::put('/account', [AccountController::class, 'changeInfo'])->name('account.changeinfo')->middleware('loggedin');

Route::put('/account/changepassword', [AccountController::class, 'changePassword'])->name('account.changepassword')->middleware('loggedin');


// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Successfully logged out');
})->middleware('loggedin');