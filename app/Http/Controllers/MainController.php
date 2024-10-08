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
        if (Auth::check() && Auth::user()->is_merchant) {
            return view('main', [
                'foods' => Food::where('status', true)->get(),
                'ismerchant' => true,
            ]);
        }

        return view('main', [
            'foods' => Food::where('status', true)->get(),
            'ismerchant' => false,
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

        try {
            if (!Auth::check()) {
                return redirect('logincustomer')->withErrors('You have to log in first');
            }

            $user = Auth::user();
            $userId = $user->id;
            $foodId = $request->id;
            $qty = $request->qty;

            $cart = [
                'qty' => $qty,
                'user_id' => $userId,
                'food_id' => $foodId,
            ];

            // Check If the food exists
            $foodData = Food::findOrFail($foodId);

            // Check if the food is already in the cart
            $userCart = Cart::where([
                ['user_id', '=', $userId],
                ['food_id', '=', $foodId],
            ])->first();
            if ($userCart) {
                $userCart->qty += $qty;
                $userCart->save();
                return redirect('/')->with('success', 'Quantity of the food has been updated inside your cart');
            }


            $foodName = $foodData->food_name;

            Cart::create($cart);

            return redirect('/')->with('success', "$foodName has been added to your cart");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Something went wrong. Please try again');
        }
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
