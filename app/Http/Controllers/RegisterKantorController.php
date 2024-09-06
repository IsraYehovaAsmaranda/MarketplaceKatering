<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterKantorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.RegisterKantor');
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
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'description' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ],[
            'name.required' => 'Name Must Be Filled',
            'address.required' => 'Address Must Be Filled',
            'contact.required' => 'Contact Must Be Filled',
            'description.required' => 'Desccription Must Be Filled',
            'email.required' => 'Email Must Be Filled',
            'password.required' => 'Password Must Be Filled',
        ]);

        $infoReqister = [
            'name' => $request->name,
            'address' => $request->address,
            'contact' => $request->contact,
            'description' => $request->description,
            'email' => $request->email,
            'password' => $request->password,
            'is_merchant'=> '0',
        ];

        $user = User::create($infoReqister);

        return redirect('/logincustomer')->with('success', 'Successfully registered. Now you can login with your new account');
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
