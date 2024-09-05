<?php

use App\Http\Controllers\MainController;
use App\Models\Food;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('main', [
//         'foods' => Food::all()
//     ]);
// });

Route::resource('/', MainController::class);

Route::get('/logincustomer', function () {
    return view('auth.loginkantor');
});

Route::get('/loginmerchant', function () {
    return view('auth.loginkatering');
});

Route::get('/food/{food}', function(Food $food) {
    $food = Food::find($food);
    return dd($food);
});


