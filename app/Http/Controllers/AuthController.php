<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function show(Request $request) {
        return view('auth.show');
    }

    public function auth(AuthRequest $request) {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->input('rememberMe'))) {
            $request->session()->regenerate();

            return redirect()->route('admin.parts.list');
        }
        return back()->withErrors(['email' => 'EMAIL INVALID OR PASSWORD INVALID']);
    }
}
