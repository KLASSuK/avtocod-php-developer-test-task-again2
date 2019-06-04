<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'MessagesController@index')
    ->name('index');

Route::post('/', 'MessagesController@addMessage')
    ->name('messages.addMessage');

Route::delete('/delete/{id}', 'MessagesController@deleteMessage')
    ->name('messages.deleteMessage');

Route::get('/regsuccess', 'MessagesController@regSuccess')
    ->name('regSuccess');
