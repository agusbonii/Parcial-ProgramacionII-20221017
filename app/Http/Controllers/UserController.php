<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function Register(Request $request)
    {
        $validateUser = $request->validate([
            'username' => 'required|max:255',
            'FullName' => 'required|max:255',
            'password' => 'required|min:8|confirmed',
        ]); 

        $username = $validateUser["username"];
        $FullName = $validateUser["FullName"];
        $password = Hash::make($validateUser["password"]);
        
        if (User::where('username', '=', $username) -> first() !== NULL)
            return redirect()->back()->withErrors(trans('user.register.exists'));
        
        $User = User::create([
            'username' => $username,
            'FullName' => $FullName,
            'password' => $password
        ]);
        
        if (isset($User))
            return back($status=201)->withSuccess(trans('user.register.success'));
            
        return redirect()->back()->withSuccess(trans('user.register.unexpected'));
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:8',
        ]); 
        $rememberme = (bool) $request->post("rememberme");

        if (Auth::attempt($credentials, $rememberme)) {
            $request->session()->regenerate();
            return redirect()->home();
        }
        return redirect()->back()->withErrors(trans('user.login.failed'));
    }

    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->home();
    }
}
