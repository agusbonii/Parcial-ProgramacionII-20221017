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
        $validateProduct = $request->validate([
            'username' => 'required|max:255',
            'FullName' => 'required|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        $username = $request->post('username');
        $FullName = $request->post("FullName");
        $password = Hash::make($request->post("password"));

        if (User::where('username', $username)->first() === NULL) {
            $User = new User();
            $User->username = $username;
            $User->FullName = $FullName;
            $User->password = $password;

            if ($User->save())
                return redirect()->back()->withSuccess(trans('user.register.success'));

            return redirect()->back()->withErrors(trans('user.register.inesperate'));
        }
        return redirect()->back()->withErrors(trans('user.register.exists'));
    }

    public function Login(Request $request)
    {
        $username = $request->post("username");
        $password = $request->post("password");
        $rememberme = (bool) $request->post("rememberme");

        $credentials = ['username' => $username, 'password' => $password];

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
