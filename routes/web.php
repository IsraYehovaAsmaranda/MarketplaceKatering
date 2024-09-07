<?php

use App\Http\Controllers\LoginKantorController;
use App\Http\Controllers\LoginKateringController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterKantorController;
use App\Http\Controllers\RegisterKateringController;
use App\Models\Food;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

// Route::get('/', function () {
//     return view('main', [
//         'foods' => Food::all()
//     ]);
// });

Route::resource('/', MainController::class);

Route::resource('/logincustomer', LoginKantorController::class);

Route::resource('/loginmerchant', LoginKateringController::class);

Route::resource('/registercustomer', RegisterKantorController::class);

Route::resource('/registermerchant', RegisterKateringController::class);

Route::get('/account', function () {
    if (!Auth::check()) {
        return redirect('/')->withErrors('You need to login to access this page');
    }
    $user = Auth::user();
    return view('pages.account.Account', ['user' => $user]);
});

Route::put('/account', [AccountController::class, 'changeInfo'])->name('account.changeinfo');

Route::put('/account/changepassword', [AccountController::class, 'changePassword'])->name('account.changepassword');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Successfully logged out');
});

Route::get('/food/{food}', function (Food $food) {
    $food = Food::find($food);
    return dd($food);
});


