<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Auth;
use Illuminate\Http\Request;
use Storage;

class FoodMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $merchantFoodMenu = Food::where('merchant_id', '=', $user->id)->get();
        $menuCategory = Category::all();
        return view('pages.FoodMenu.FoodMenu', ['user' => $user, 'foodmenus' => $merchantFoodMenu, 'menucategory' => $menuCategory]);
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
            'foodname' => 'required',
            'foodcategory' => 'required|exists:categories,id',
            'foodprice' => 'required|numeric',
            'fooddescription' => 'required',
            'foodimage' => 'required|mimes:jpg,jpeg,png'
        ], [
            'foodname.required' => 'Food name must be filled',
            'foodcategory.exists:categories,id' => 'Category does not exist',
            'foodcategory.required' => 'Food category must be filled',
            'foodprice.required' => 'Food price must be filled',
            'foodprice.numeric' => 'Food price must be a number',
            'fooddescription.required' => 'Food description must be filled',
            'foodimage.required' => 'Image must be filled',
            'foodimage.mimes:jpg,jpeg,png' => 'Image type must be JPG, or PNG',
        ]);

        $user = Auth::user();

        $foodImagePath = $request->file('foodimage')->store('food_menu', 'public');

        try {
            Food::create([
                'merchant_id' => $user->id,
                'category_id' => $request->foodcategory,
                'food_name' => $request->foodname,
                'description' => $request->fooddescription,
                'image_url' => $foodImagePath,
                'price' => $request->foodprice
            ]);
            return redirect('/menu')->with('success', 'New menu has been addded');
        } catch (\Throwable $th) {
            return redirect('/menu')->withErrors('Failed adding menu, something went wrong');
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
