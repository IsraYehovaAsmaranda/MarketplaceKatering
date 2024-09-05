<?php

use App\Http\Controllers\LoginKantorController;
use App\Http\Controllers\LoginKateringController;
use App\Http\Controllers\MainController;
use App\Models\Food;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('main', [
//         'foods' => Food::all()
//     ]);
// });

Route::resource('/', MainController::class);

Route::resource('/logincustomer', LoginKantorController::class);

Route::resource('/loginmerchant', LoginKateringController::class);

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/')->with('success', 'Berhasil Logout');
});

Route::get('/food/{food}', function(Food $food) {
    $food = Food::find($food);
    return dd($food);
});


