<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signin(){
        $user = User::where('username', request('username'))->first();

        if (!$user) {
            session()->flash('Gagal', 'Username and Password invalid');
            return back();
        }

        $data = [
            'username' => request('username'),
            'password' => request('password')
        ];

        if (Auth::attempt($data)) {
            request()->session()->regenerate();
            return redirect()->intended();
        } else {
            session()->flash('Gagal', 'Username and Password invalid');
            return back();
        }
    }
    public function signup(){
        // dd(request());
        // $foto = request()->file('profile');
        $data = [
            'fullname' => request('fullname'),
            'username' => request('username'),
            'email' => request('email'),
            'profile' => request('profile'),
            'password' => Hash::make(request('password')),
            'alamat' => request('alamat')
        ];
        // dd($data);


        if(User::create($data)){
            session()->flash('Berhasil', 'Register Succes');
            return redirect('/signin');
        }else {
            session()->flash('Gagal', 'Register Unsucces');
            return redirect('/signup');
        };

    }

    Public function signout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/signin');
    }
}
