<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
//    Регистрация
    public function signup(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:re_password',
            'username' => 'required|min:3|max:60|unique:users,username',
            'photo' => 'nullable|mimes:jpg,jpeg,png',
//            'policy' => 'accepted'
        ], [
            'email' => 'User is already existed'
        ],
        [
            'username' => 'имя пользователя'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $validated = $validator->validated();

        $validated['password'] = Hash::make($validated['password']);

        if ($request->file('photo')) {
            $validated['image_path'] = $request->file('photo')->store('public/images');
        }

        $user = User::query()->create($validated);

        Auth::login($user);

        return redirect()->route('home');

    }

//    Авторизация
    public function signin(SignInRequest $request) {
        $validated = $request->validated();

        if(!Auth::attempt($validated)) {
            return back()->withErrors(['Invalid credentials']);
        }

        return redirect()->route('home');
//        Auth::attempt($validated);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
