@extends('layouts.app')

@section('title_of_page')
    <title>Стена сообщений | Регистрация</title>
@endsection

@section('h1')
@endsection

@section('style')
    <style type="text/css">
        .form-signup {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signup .form-signup-heading {
            margin-bottom: 10px;
        }

        .form-signup .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signup .form-control:focus {
            z-index: 2;
        }

        .form-signup input#email {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signup input#password {
            margin-bottom: -1px;
            border-radius: 0;
        }

        .form-signup input#password-confirm {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('register') }}" class="form-signup">
            @csrf
            <h2 class="form-signup-heading">Регистрация</h2>

            <label for="name" class="sr-only">Имя</label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                   value="{{ old('name') }}" placeholder="Имя" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
            @endif

            <label for="email" class="sr-only">Логин</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   name="email" value="{{ old('email') }}" placeholder="E-mail" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
            @endif

            <label for="password" class="sr-only">Пароль</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                   name="password" placeholder="Пароль" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
            @endif

            <label for="password-confirm" class="sr-only">Повторите пароль</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                   placeholder="Пароль (ещё раз)" required>

            <button type="submit" class="btn btn-lg btn-primary btn-block">Зарегистрироваться</button>
        </form>
    </div>
@endsection
@section('active tab and username plus exit')
    <ul class="nav navbar-nav">
        @guest
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li><a href="{{ route('login') }}">Авторизация</a></li>
            @if (Route::has('register'))
                <li class="active"><a href="{{ route('register') }}">Регистрация</a></li>
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
@endsection
