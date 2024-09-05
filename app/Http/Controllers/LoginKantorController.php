<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginKantorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.loginkantor');
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
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infoLogin)){
            
            $user = Auth::user();

            if(!$user->is_merchant) {
                return redirect('/')->with('success', "Berhasil Login Sebagai Customer");
            } else {
                Auth::logout();
                return redirect('logincustomer')->withErrors('Akun ini terdaftar sebagai merchant');
            }
            
        } else {
            // If Failed
            return redirect('logincustomer')->withErrors('Username atau Password Salah');
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
