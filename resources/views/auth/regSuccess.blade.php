@extends('layouts.app')
@section('title_of_page')
    <title>Стена сообщений | Регистрация завершена</title>
@endsection

@section('content')
    <div class="container">
        <h1>Ура!</h1>
        <h3>Поздравляем! Вы успешно зарегистрировались.</h3>
        <p>Воспользуйтесь <a href="{{ route('login') }}">формой авторизации</a> чтобы войти на сайт под своей учетной
            записью.</p>
    </div>
@endsection

@section('active_tab')
    <ul class="nav navbar-nav">
        <!-- Authentication Links -->
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
