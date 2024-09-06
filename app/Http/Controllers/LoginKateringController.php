<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginKateringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.loginkatering');
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
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email Must Be Filled',
            'password.required' => 'Password Must Be Filled',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infoLogin)){
            
            $user = Auth::user();

            if($user->is_merchant) {
                return redirect('/')->with('success', "Successfully logged in as merchant");
            } else {
                Auth::logout();
                return redirect('loginmerchant')->withErrors('This account is registered as customer, please use the corresponding menu');
            }
            
        } else {
            // If Failed
            return redirect('loginmerchant')->withErrors('Username or password is invalid');
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
