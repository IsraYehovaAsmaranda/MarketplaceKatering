<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);
        
        $user = Auth::user();

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password has been changed successfully');
    }

    public function changeInfo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required|numeric',
            'description' => 'required',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->description = $request->description;

        $user->save();

        return redirect()->back()->with('success', 'Information has been changed successfully');
    }
}
