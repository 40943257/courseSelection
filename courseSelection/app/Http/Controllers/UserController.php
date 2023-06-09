<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignRequest;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    public function loginPage () {
        if(auth()->check())
            return redirect()->route('index');
        else
            return view('user.loginPage');
    }

    public function login(LoginRequest $request) {
        $check1 = [
            'email'     =>  $request->account,
            'password'  =>  $request->password
        ];

        $check2 = [
            'account'  =>  $request->account,
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

    public function signupPage () {
        if(auth()->check())
            return redirect()->route('index');
        else
            return view('user.signupPage');
    }

    public function signup (SignRequest $request) {
        if(User::where('account', '=', $request->account)->count() == 0) {
            $data = [
                'account'       =>  $request->account,
                'password'      =>  Hash::make($request->password),
                'email'         =>  $request->email,
                'name'          =>  $request->name,
                'permissions'   =>  $request->permissions
            ];

            User::create($data);

            return view('user.loginPage');
        }
        else {
            return back()->withErrors([
                'message' => '帳號已存在'
            ]);
        }
        return 1;
        return back();
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('index');
    }
}
