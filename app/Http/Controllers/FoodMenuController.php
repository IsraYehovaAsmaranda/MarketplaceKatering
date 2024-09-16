<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Auth;
use Illuminate\Http\Request;

class FoodMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $merchantFoodMenu = Food::where('merchant_id', '=', $user->id)->get();
        return view('pages.FoodMenu', ['user' => $user, 'foodmenus' => $merchantFoodMenu]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Food::create([
          'merchant_id' => 16,
          'category_id' => 1,
          'food_name'  => 'Testing',
          'description' => 'Description',
          'image_url' => 'https://cdn.britannica.com/36/123536-050-95CB0C6E/Variety-fruits-vegetables.jpg',
          'price' => 20000
        ]);
        return redirect('/menu')->withErrors('Testing');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
