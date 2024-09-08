<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main', [
            'foods' => Food::all()
        ]);
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
        $request->validate([
            'qty' => 'required|numeric',
            'id' => 'required',
        ]);

        $user = Auth::user();
        $userId = $user->id;

        $cart = [
            'qty' => $request->qty,
            'user_id' => $userId,
            'food_id' => $request->id,
        ];

        $foodData = Food::where('id', '=', $request->id)->first();

        if(!$foodData){
            return redirect('/')->withErrors('Food not found');
        }

        $foodName = $foodData->food_name;

        Cart::create($cart);

        return redirect('/')->with('success', "$foodName has been added to your cart");
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
