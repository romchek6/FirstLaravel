<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{

    public function index(Request $request){

        $value = $request->cookie('user');

        $user = DB::table('users')->where('login' ,$value )->first();

        if($user !== null){

            return redirect()->route('post');

        }

        return view('registration');

    }

    public function store( Request $request){

        if ($request->isMethod('post')) {

            // валидация формы
            $request->validate([
                'login'  => 'required|max:255|min:3',
                'email'   => 'required',
                'password' => 'required|max:255|min:3',
                'password-confirm' => 'required|max:255|min:3',
            ]);

        }

        $login = $request->input('login');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirm = $request->input('password-confirm');

        $user = DB::table('users')->where('login' ,$login )->orWhere('email' , $email)->first();

        if($user !== null){

            return redirect()->route('registration' , ['error' => "Пользователь с такими данными уже зарегистрирован"]);

        }

        if($password !== $password_confirm){

            return redirect()->route('registration' , ['error' => "Пароли не совпадают"]);

        }

        DB::table('users')->insert(
            [
            'login' => $login,
            'email' => $email,
            'password' => md5($password),
            ]
        );

        return redirect()->route('login');

    }

}
