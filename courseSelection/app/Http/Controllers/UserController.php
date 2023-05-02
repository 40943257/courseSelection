<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function loginPage () {
        return view('user.login');
    }

    public function login(Request $request) {
        $check1 = [
            'email'     =>  $request->account,
            'password'  =>  $request->password
        ];

        $check2 = [
            'schoolId'  =>  $request->account,
            'password'  =>  $request->password
        ];

        if(auth()->attempt($check1) || auth()->attempt($check2)) {
            return redirect()->route('index');
        }
        else {
            return back()->withErrors([
                'message' => '帳號或密碼錯誤'
            ]);
        }
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('index');
    }
}
