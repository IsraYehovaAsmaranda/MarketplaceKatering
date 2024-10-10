<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function store(Request $request)
    {
        try {
            $cartData = Cart::findOrFail($request->selectedCart);
            $foodData = $cartData->food;
            return view('pages.checkout.CheckOut', ['cartId' => $request->selectedCart, 'foodData' => $foodData, 'cartQty' => $request->qty]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors("Something went wrong, please try again");
        }
    }
}
