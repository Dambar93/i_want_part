<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;


class RegisterController extends Controller
{


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
        

        return ['message' => 'User created succesfully'];
    }
}
