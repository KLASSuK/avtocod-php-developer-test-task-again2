<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'MessagesController@index')
    ->name('index');

Route::post('/', 'MessagesController@addmessage')
    ->name('messages.addmessage');

Route::delete('/delete/{id}', 'MessagesController@delete')
    ->name('messages.delete');
