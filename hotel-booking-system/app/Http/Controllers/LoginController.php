<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.index');
    }

    public function authenticate(LoginRequest $request) {
        if(Auth::attempt($request->validated())){
            // $token = auth()->user()->createToken('Token name')->accessToken;
            // return response()->json(['token'=>'done']);
            return redirect()->route('home');
        }
        return redirect()->back();
    }
}
