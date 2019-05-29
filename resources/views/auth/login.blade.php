@extends('layouts.app')

@section('title_of_page')
    <title>Стена сообщений | Авторизация</title>
@endsection

@section('h1')
@endsection

@section('style')
    <style type="text/css">
        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin .checkbox {
            font-weight: normal;
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="form-signin-heading">Авторизация</h2>

            <label for="user_login" class="sr-only">Логин</label>
            <input type="email" id="user_login"
                   class="form-control" {{ $errors->has('email') ? ' is-invalid' : '' }} placeholder="E-mail"
                   name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong></span>
            @endif

            <label for="user_password" class="sr-only">Пароль</label>
            <input type="password" id="user_password"
                   class="form-control" {{ $errors->has('password') ? ' is-invalid' : '' }} placeholder="Пароль"
                   name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong></span>
            @endif

            <div class="checkbox">
                <label class="form-check-label" for="remember">

                    <input type="checkbox" name="remember" checked
                           id="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                </label>
            </div>

            <button type="submit" class="btn btn-lg btn-primary btn-block">Войти</button>
        </form>
    </div>

@endsection

@section('active tab and username plus exit')
    <ul class="nav navbar-nav">
        @guest
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li class="active"><a href="{{ route('login') }}">Авторизация</a></li>
            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Регистрация</a></li>
            @endif
        @else
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="navbar-text"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</li>
        <li><a class="logout-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-log-out"></span> {{ __('Выход') }}</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
    </ul>
@stop
