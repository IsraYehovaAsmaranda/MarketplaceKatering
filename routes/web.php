<?php

use App\Models\Food;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main', [
        'foods' => Food::all()
    ]);
});

Route::get('/logincustomer', function () {
    return view('loginkantor');
});

Route::get('/loginmerchant', function () {
    return view('loginkatering');
});

Route::get('/food/{food}', function(Food $food) {
    $food = Food::find($food);
    return dd($food);
});


