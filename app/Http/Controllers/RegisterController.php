<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register.index');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', Password::min(6), 'same:second_password'],
            'second_password' => ['required'],
            'birthday' => ['required']
        ]);


        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);

        return Redirect::route('admin.parts.list');
    }
}
