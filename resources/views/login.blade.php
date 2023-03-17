@extends('layouts.main')
@section('content')
<div class="login-container" style="
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: center;
    ">
    <form method="post" style="width: 600px;" action="/">
        @csrf
        <div class="form-group">
            <label for="login">Логин</label>
            <input name="login" class="form-control" id="login" placeholder="Введите логин">
        </div>
        <div class="form-group" style="margin-bottom: 5px">
            <label for="password">Пароль</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Введите пароль">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
        <a href="/registration" class="btn btn-primary">Регистрация</a>
    </form>
</div>
@endsection
