<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Cookie;


class LoginController extends Controller
{

    public function index(Request $request){

        $value = $request->cookie('user');

        $user = DB::table('users')->where('login' ,$value )->first();

        if($user !== null){

            return redirect()->route('post.index');

        }

        return view('login');

    }

    public function store(Request $request){

        if ($request->isMethod('post')) {

            // валидация формы
            $request->validate([
                'login'  => 'required',
                'password' => 'required',
            ]);

        }

        $login = $request->input('login');
        $password = $request->input('password');

        $user = DB::table('users')->where('login' ,$login )->first();

        if($user === null || $user->password !== md5($password)){

            return redirect()->route('login' , ['error' => "Проверьте правильность введённых данных"]);

        }

        $cookie = cookie('user', $login, 60);

        return redirect()->route('post.index')->cookie($cookie);

    }

}
